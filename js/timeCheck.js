const date = new Date()
var hour = date.getHours() + 1 //Can change to dynamic if DB has length of time from each location
var minute = date.getMinutes()
var time = hour + ":" + minute;

function timeCheck(){
    // var timeText = document.getElementById('timeCheck');
    // console.log(timeText);
    if(hour >= 13 && hour <= 23){
        var timeOfDay = 'PM';
        var finalTime = time + ' ' + timeOfDay;
        document.write(finalTime);
        return finalTime;
    }
    
    else{
        var timeOfDay = 'AM';
        var finalTime = time + ' ' + timeOfDay;
        document.write(finalTime);
        return finalTime;
    }
}