<html>
<head>
  <title>Twitter Bootstrap : Stacked Progress Bar</title>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="http://code.jquery.com/jquery.min.js"></script>

<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
</head>
<style>
  .bootstrap-demo{margin:30px;}
</style>
<script type="text/javascript">
	$(function () {
    $('[data-toggle="tooltip"]').tooltip();
});

	// var types = ['url', 'fb-post', 'fb-video', 'tweet', 'youtube-video', 'hashtags'];
</script>
<body>
<div class="bootstrap-demo">
  <div class="jumbotron">
    <h1>Bassita Progress Bar Example!</h1>
    <p>The following aims to present a progress bar example for the following links:</p>
    <ul>
      <li><a href="https://www.youtube.com/watch?v=rrRljndvV_0">When has helping gone out of style? A success story! (Youtube Video)</a></li>
      <li><a href="http://bassita.org/en/causes/when-has-helping-gone-out-of-style-a-success-story">When has helping gone out of style? A success story! (Website URL)</a></li>
    </ul>
  </div>
   <div class="progress">
    
    <!-- Multiple progress bars within a single div with class progress -->
   <div class="progress-bar progress-bar-normal progress-bar-striped active" style="width: {youtube}%" data-toggle="tooltip" data-placement="top" title data-original-title="{youtube_view_count} Views">
        {youtube_view_count} Youtube Views
   </div>
	  
    <div class="progress-bar progress-bar-warning progress-bar-striped active" style="width: {fshare}%" data-toggle="tooltip" data-placement="top" title data-original-title="{share_count} Facebook Shares">
        {share_count} Shares
    </div>
	  
    <div class="progress-bar progress-bar-danger progress-bar-striped active" style="width: {flike}%" data-toggle="tooltip" data-placement="top" title data-original-title="{like_count} Likes">
        {like_count} Likes
    </div>
	   
    <div class="progress-bar progress-bar-normal progress-bar-striped active" style="width: {tweets}%" data-toggle="tooltip" data-placement="top" title data-original-title="{tweet_count} Tweets">
        {tweet_count} Tweets
    </div>
       
<!--     <div class="progress-bar progress-bar-warning progress-bar-striped active" style="width: {fcomments}%" data-toggle="tooltip" data-placement="top" title data-original-title="{comment_count} Comments">
       {comment_count} Comments
    </div>   -->
</div>
 </div>
</body>
</html> 