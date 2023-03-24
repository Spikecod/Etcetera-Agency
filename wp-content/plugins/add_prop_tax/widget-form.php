<h5>Filter</h5>
<form>
  <input type="hidden" value="1" name="page" id="page">
  <label for="property-name">Property name:</label>
  <input type="text" id="property-name" name="property-name"><br>

  <label for="coordinates">Coordinates:</label>
  <input type="text" id="coordinates" name="coordinates"><br>

  <label for="building-type">Building type:</label>
  <select id="building-type" name="building-type">
    <option value="">any</option>
    <option value="панель">панель</option>
    <option value="цегла">цегла</option>
    <option value="піноблок">піноблок</option>
  </select><br>

  <label for="floors">Floors:</label>
  <select id="floors" name="floors">
    <option value="">any</option> 
    
<?php
for ($i = 1; $i <= 20; $i++) {
    echo '<option value="' . $i . '">' . $i . '</option>';
}
?>
    
    
  </select><br>
   <label for="floors">Rooms:</label>
  <select id="rooms" name="rooms">
    <option value="">any</option>   
<?php
for ($i = 1; $i <= 10; $i++) {
    echo '<option value="' . $i . '">' . $i . '</option>';
}
?>
    
    
  </select><br>

  <label for="square">Square:</label>
  <input type="text" id="square" name="square"><br>

  <label for="balcony">Balcony:</label>
  <select id="balcony" name="balcony">
    <option value="">dont care</option> 
    <option value="так">Yes</option>
    <option value="ні">No</option>
  </select><br>

  <label for="wc">WC:</label>
  <select id="wc" name="wc">
    <option value="">dont care</option> 
    <option value="так">Yes</option>
    <option value="ні">No</option>
  </select><br>

  <label for="eco-friendly">Eco-friendly:</label>
  <select id="eco-friendly" name="eco-friendly">
    <option value="">any</option> 
  <?php
for ($i = 1; $i <= 5; $i++) {
    echo '<option value="' . $i . '">' . $i . '</option>';
}
?>
  </select><br>

  <input type="submit" value="Submit" onclick="setpage()">
</form>

<script >
var page=1
function setpage()
{page=1 }
jQuery(document).ready(function($) {
  $('form').submit(function(event) {
    event.preventDefault(); // Prevent form from submitting normally
    // Get the form data
    var formData = {
      'propertyname': $('#property-name').val(),
      'coordinates': $('#coordinates').val(),
      'building-type': $('#building-type').val(),
      'floors': $('#floors').val(),
      'rooms': $('#rooms').val(),
      'square': $('input[name=square]').val(),
      'balcony': $('#balcony').val(),
      'wc': $('#wc').val(),
      'eco-friendly': $('#eco-friendly').val()
    };
    
    // Add the nonce to the form data
    formData.nonce = $('input[name=ajax-nonce]').val();

    // Send the AJAX request
    $.ajax({
      type: 'POST',
      url: '<?php echo admin_url('admin-ajax.php'); ?>',
      data: {
        'action': 'my_widget_submit',
        'form_data': formData,
        'page': page
      },
      success: function(response) {
        $('.filter-render').html(response);
        console.log(response);
      },
      error: function(jqXHR, textStatus, errorThrown) {
        console.error('AJAX Error: ' + textStatus + ' ' + errorThrown);
      }
    });
  });
  
      $('.filter-render').on('click', '.pagination-block a', function(e) {
             console.log('Click event triggered');
             link=$(this).attr('href');
             e.preventDefault();
             $(this).attr('disabled', 'disabled'); // disable the link
             url = new URL(link);    
             const pathname = url.pathname;
const regex = /\/page\/(\d+)/; // regular expression to extract the page number
 pageMatch = pathname.match(regex); // find the first match of the regex in the pathname
      var newPage = pageMatch ? parseInt(pageMatch[1]) : 1;
      page=newPage;
       $('form').submit();    
    });
  
  
    $('form').submit();    
});
</script>