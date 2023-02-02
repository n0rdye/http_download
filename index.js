function read(){
    $.ajax({url:".conf/read.php", success:function(result){
        arr = result.split("|");
        console.log(arr);
        arr.forEach(element => {
            console.log(element);
            if(element!=""&&element!="."&&element!=".."&&element!=".conf"&&element!="index.html"){
                // document.getElementById("list").innerHTML += `<li>`+`<a href='.conf/download.php?file=${element}'>`+element+"</a>"+"</li>"; 
                document.getElementById("list").innerHTML 
                +=`<li>`
                +`<label "href"='.conf/download.php?file=${element}'>`+element+"</label>"
                +"<br>"
                +`<a href="https://files.clickey.site/.conf/download.php?file=${element}"> download mirror 1 </a>`
                +`<button onclick="copy('https://files.clickey.site/.conf/download.php?file=${element}')"> copy link mirror 1</button>`
                +"<br>"
                +`<a href="http://main.clickey.site:90/.conf/download.php?file=${element}"> download mirror 2 </a>`
                +`<button onclick="copy('http://main.clickey.site:190/.conf/download.php?file=${element}')"> copy link mirror 2</button>`
                +"</li>"; 

            }
});
    }
})};

function copy(text){
    function copyToClipboard(text) {
        window.prompt("Copy to clipboard: Ctrl+C, Enter", text);
    }
    copyToClipboard(text);
}