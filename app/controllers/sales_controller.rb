class SalesController < ApplicationController

  skip_before_action :set_sale, only: [:index, :import, :upload]
  # before_action :set_sale, except: [:index, :import, :upload]
  add_breadcrumb "Sales", :sales_path

  def index    
    @sales = Sale.paginate(:page => params[:page], :per_page => 5)
  end

  def show
  end

  def new
    add_breadcrumb "New", new_sale_path
    @sale = Sale.new
  end

  def edit
    add_breadcrumb "Edit", edit_sale_path
    @sale = Sale.find(params[:id])
  end

  def create
    @sale = Sale.new(sale_params)

    respond_to do |format|
      if @sale.save
        format.html { redirect_to sales_path, notice: 'Sale was successfully created.' }
      else
        format.html { render :new }
        format.json { render json: @sale.errors, status: :unprocessable_entity }
      end
    end
  end

  def update
    respond_to do |format|
      if @sale.update(sale_params)
        format.html { redirect_to sales_path, notice: 'Sale was successfully updated.' }
      else
        format.html { render :edit }
        format.json { render json: @sale.errors, status: :unprocessable_entity }
      end
    end
  end

  def destroy
    @sale.destroy
    respond_to do |format|
      format.html { redirect_to sales_url, notice: 'Sale was successfully destroyed.' }
      format.json { head :no_content }
    end
  end

  def import    
    case request.method_symbol
    when :get
      add_breadcrumb "Import", sales_import_path
      render action: "import"
    when :post
      unless params[:file].nil?
        @gross_revenue = Sale.import(params[:file]) 
        unless @gross_revenue.nil?
          render sales_import_path, :locals => {:status => "success", :notice => "Sales were successfully imported.", :gross_revenue=> @gross_revenue}
        else
          render sales_import_path, :locals => {:status => "danger", :notice => "Error on import file.", :gross_revenue=> @gross_revenue}
        end          
      else
        render sales_import_path, :locals => {:status => "danger", :notice => "Error: No chosen file.", :gross_revenue=> @gross_revenue}
      end 
    end
  end
  
  private

    # Use callbacks to share common setup or constraints between actions.
    def set_sale
      @sale = Sale.find(params[:id])
    end

    # Never trust parameters from the scary internet, only allow the white list through.
    def sale_params
      params.require(:sale).permit(:purchaser_name, :item_description, :item_price, :purchase_count, :merchant_address, :merchant_name)
    end
end
