//twitter feed function
function twitter_feed(username,numtweets,container,tweet_holder)
{
	if($(container).length)
	{
		//get the feed
		$.ajax({
			url: "https://twitter.com/statuses/user_timeline.json?screen_name="+username+"&count="+numtweets+"&callback=?",
			dataType: 'json',
			success: function(data)
			{
				//get the data
				$.each(data, function(i,item){
				tweet = item.text;
				$(container).append('<'+tweet_holder+'>'+tweet+'</'+tweet_holder+'>');
				});
			  
			}
		});
	}
}