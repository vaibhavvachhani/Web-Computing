<?php
if (!isset($_SESSION['isUser']))
{
  echo '<p>You are not logged in. Log in to leave a review.</p>';
}
else
{
  //Session set

  echo '<br><br><br>';
  echo '<label>Review</label>';
  echo '<span class="error-server"><?php echo $reviewErr;?></span>';
  echo '<span id="reviewMissing" class="error-message">Review invalid</span>';
  echo '<input type="text" value="" id="review" name="review" placeholder="Your review here">';
  echo '<span id="ratingMissing" class="error-message">Rating invalid</span>';
  echo '<label for="rating">Rating</label>';
  echo '<select id="rating" name="rating" class="dropdown" value="">';
    echo '<option value=1>1</option>';
    echo '<option value=2>2</option>';
    echo '<option value=3>3</option>';
    echo '<option value=4>4</option>';
    echo '<option value=5>5</option>';
  echo '</select>';
  echo '<input type="submit" value="Submit">';
}
?>
