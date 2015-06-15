class StringInput < Formtastic::Inputs::StringInput
  def input_html_options
    {:class => 'form-control'}
  end

  def to_html      
    builder.text_field(input_name, input_html_options) 
  end 
end