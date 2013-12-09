/***************************
 ***************************
  Tag
 ***************************
 ***************************/
 
function initializeTag(){
  loadStoriesByTag();
}


function loadStoriesByTag(){
  console.log('Yo Mama');
  getVideos({tag:TAG}).done(function(data){
    showStories($('#storyContainer'),data.result);
  });
}