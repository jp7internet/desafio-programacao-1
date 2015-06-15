$(document).ready( function() { 

  $(document).on('change', '.btn-file :file', function() {
      var input = $(this),
          numFiles = input.get(0).files ? input.get(0).files.length : 1,
          label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
          $(this).closest(".input-group").find("input[type=text]").val(label);
          input.trigger('fileselect', [numFiles, label]);
      
    });
 
});