/**
 * Created by jtusta on 2017/4/9.
 */
function getToday() {
    var now = new Date();
    var firstDay = new Date(now.getFullYear(), 0, 1);
    var dateDiff = now - firstDay;
    var msPerDay = 1000 * 60 * 60 * 24;
    var diffDays = Math.ceil(dateDiff / msPerDay);
    return diffDays;
}
function getDay(){
    var now=new Date();
    var nowYear=now.getFullYear();
    var days=getToday()-85+(nowYear-2017)*365;
    return days;
}

