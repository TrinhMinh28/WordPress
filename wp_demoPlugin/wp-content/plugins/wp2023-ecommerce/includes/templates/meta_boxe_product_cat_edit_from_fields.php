<?php
echo '<pre>';
print_r($tag);
print_r($taxonomy);
echo '</pre>';
$image = get_term_meta($tag->term_id,'image',true);
?>
<tr class="form-field term-description-wrap">
    <th scope="row"><label for="description">Hình ảnh</label></th>
    <td><input value="<?= $image;?>" value name="description" id="description" rows="3" cols="50" class="large-text" >
    </td>
</tr>