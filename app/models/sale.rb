class Sale < ActiveRecord::Base

  validates :purchaser_name, :item_description, :merchant_address, :merchant_name, presence: true
  validates :item_price, numericality: true
  validates :purchase_count, numericality: { only_integer: true }

  def self.import file    

    lines = file.read.split("\n")       
    count_lines = lines.size-1
    cols = lines[0].split("\t").map{|col| col.parameterize.underscore }      

    objs = []
    revenue = 0

    for i in 1..count_lines
      sale = new
      sale.attributes = Hash[*[cols,lines[i].split("\t")].transpose.flatten]      
      revenue = revenue+(sale.item_price*sale.purchase_count)
      objs << sale
    end     

    self.transaction do
      objs.each(&:save!)
    end

    return revenue
  end
end
