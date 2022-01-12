async function getapi(url) {

    console.log("mark1")
    
    var xhr = new XMLHttpRequest();

    console.log("mark2")
    
    xhr.open('GET', url, true);

    console.log("mark3")

    xhr.onload = function(){
        if(this.status == 200){
            console.log("status 200")
            var data = this.responseText;
            console.log("data = responsetext")
            data = JSON.parse(data);
            console.log(data);
            
            data.forEach((value, i) => {
                let row = table.insertRow(-1);
                row.insertCell(0).innerHTML = `${value.EmpName}`;
                row.insertCell(1).innerHTML = `${value.EmpSurname}`;
                row.insertCell(2).innerHTML = `${value.EmpAddress}`;
                row.insertCell(3).innerHTML = `${value.EmpPhone}`;      
    })
        }

    }
    xhr.send()
    }

var api_url = "./api/search.php";

console.log("mark4");

let table = document.getElementById('infinite-table');

getapi(api_url)

    
