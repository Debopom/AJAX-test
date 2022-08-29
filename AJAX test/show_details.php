<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table id ="details"></table>

    <script>
        function getData(){
            let id = document.getElementById("id").value; 
            console.log(id);
            var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var myObj = JSON.parse(this.responseText);
                    if(myObj["content"].length>0){
                        
                        
                        var table = document.getElementById('details');
                        var trheader = document.createElement('tr');
                        trheader.innerHTML = "<tr> <td> id </td><td> name </td> </tr>";
                        table.append(trheader);
                        for (let i = 0; i < myObj["content"].length; i++) {
                            console.log(i);
                            var tr = document.createElement('tr');  
                        tr.innerHTML = "<tr> <td>" + myObj.content[i].update_no + "</td> <td>" + myObj.content[i].description + "</td> </tr>";
                            table.append(tr);
                        }
                    }
                    else{
                        document.getElementById("details").innerHTML = "no data found";
                        document.getElementById("details").border = "0px";
                    }

                    }
                };
                xmlhttp.open("GET","project_detalis_api.php?id=" + id, true);

                xmlhttp.send();
        }
    
    
</script>
<input type="int" id="id" name="id" placeholder ="Please emter id number">
<button onclick = 'getData()'>Submit</button>
    
</body>
</html>