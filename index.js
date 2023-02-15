$(function() {
    read(dir);
});

let dir = "../";

function read(dirr) {
    $.ajax({
        type: "GET",
        url: "./read.php?p=" + dirr,
        success: function(result) {

            // console.log(result);
            // return;
            let dirarr = dirr.split("/");
            let darr = dirr.split("/");
            dirarr.splice(dirarr.length - 2, 2);
            let dirrr = dirarr.join("/");

            let arr = result.split("|");
            // console.log(result);
            // console.log(arr);
            dirrr = (dirrr == "") ? ".." : dirrr;

            document.getElementById("list").innerHTML = "";

            let dir_str = "",
                dir_lvl = "";
            darr.forEach(element => {
                if (element != "") {
                    dir_lvl += element + "/";
                    dir_str += `<button onclick="read('${dir_lvl}');">${element}/</button>`;
                    // console.log(element);
                }
            });
            // console.log(dir_str);
            // console.log(dirarr);
            document.getElementById("dir").innerHTML = dir_str;
            document.getElementById("back").innerHTML = `<button onclick="read('${dirrr}/');" >back</button>`;
            dirr = dirr.replace(/~/g, " ");
            // console.log(dirr);

            arr.forEach(element => {
                element = element.replace(/~/g, " ");
                console.log(element);
                // console.log(element.split(".")[0] != "", element != "index.html");
                $.ajax({
                    type: "GET",
                    url: `./is_dir.php?p=${dirr}/${element}`,
                    success: function(result_path) {
                        if (element.split(".")[0] != "" && element != "index.html") {
                            // document.getElementById("list").innerHTML += `<li>`+`<a href='.conf/download.php?file=${element}'>`+element+"</a>"+"</li>"; 
                            let f = (result_path == `${dirr}/${element}`) ? `<button onclick="read('${dirr}${element}/');">go_to></button>` : "";
                            let type = (f != "") ? "folder" : "file";
                            // console.log(result_path);
                            let download_link = `${dirr}${element}`;
                            download_link = download_link.replace(/ /g, "~");
                            // download_link = download_link.replace(" ", "%^%");
                            // console.log(download_link);
                            document.getElementById("list").innerHTML += `<li>` +

                                "<div class='title'>" +
                                "<div class=`title-name`>" +
                                f +
                                `<label>${element}</label>` +
                                "</div>" +
                                type +
                                "</div>" +

                                "<div class='input'>" +

                                "<div class='i-1'>" +
                                `<a href="http://main.clickey.site:190/.conf/download.php?file=${download_link}">mirr_1<</a>` +
                                `<button onclick="copy('http://main.clickey.site:190/.conf/download.php?file=${download_link}')">copy</button>` +
                                "</div>" +

                                "<div class='i-2'>" +
                                `<a href="https://files.clickey.site/.conf/download.php?file=${download_link}">mirr_2<</a>` +
                                `<button onclick="copy('https://files.clickey.site/.conf/download.php?file=${download_link}')">copy</button>` +
                                "</div>" +

                                "<div class='i-3'>" +
                                `<a href="http://lan.clickey.site:90/.conf/download.php?file=${download_link}">lan<</a>` +
                                `<button onclick="copy('http://lan.clickey.site:90/.conf/download.php?file=${download_link}')">copy</button>` +
                                "</div>" +

                                "</div>" +
                                "</li>";

                        }
                    }
                })

            });
        }
    })
}

function copy(text) {
    function copyToClipboard(text) {
        window.prompt("Copy to clipboard: Ctrl+C, Enter", text);
    }
    copyToClipboard(text);
}