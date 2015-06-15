class SelectInput < Formtastic::Inputs::SelectInput
  def input_html_options
    {:class => 'form-control'}
  end

  def to_html      
    builder.select(input_name, collection, input_options, input_html_options)    
  end 
end