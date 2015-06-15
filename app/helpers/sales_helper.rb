module SalesHelper
  def gross_revenue_format gross_revenue    
    "The gross revenue of this file is #{number_to_currency(gross_revenue, locale: :br)}"    
  end

  def monetary_unit_format val
    number_to_currency(val, locale: :br)
  end
end
