const open_time = document.getElementById('open_time');
const close_time = document.getElementById('close_time');


function foo(open_time, close_time ){

    if (open_time < close_time) {
        console.log(open_time.value)
        console.log('valiidddd')
        return false
    } else {
        // console.log(open_time)
        // return false
    }
    // return open_time < close_time;
}
