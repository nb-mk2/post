<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Autocomplete by MRoblesDev</title>
  <style type="text/css">
    ul {
      list-style-type: none;
      width: 300px;
      height: auto;
      position: absolute;
      margin-top: 10px;
      margin-left: 10px;
    }
    li {
      background-color: #EEEEEE;
      border-top: 1px solid #9e9e9e;
      padding: 5px;
      width: 100%;
      float: left;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <h3>Autocomplete</h3>
  <form action="" method="post" autocomplete="off">
    <div>
      <label for="campo">Buscar:</label>
      <input type="text" name="campo" id="campo">
      <ul id="lista"></ul>
    </div>
  </form>
  <script>
    document.getElementById("campo").addEventListener("keyup", getCodigos)

    function getCodigos() {

        let inputCP = document.getElementById("campo").value
        let lista = document.getElementById("lista")

        if (inputCP.length > 0) {

            let url = "ajax.php"
            let formData = new FormData()
            formData.append("campo", inputCP)

            fetch(url, {
                method: "POST",
                body: formData,
                mode: "cors" //Default cors, no-cors, same-origin
            }).then(response => response.json())
                .then(data => {
                    lista.style.display = 'block'
                    lista.innerHTML = data
                })
                .catch(err => console.log(err))
        } else {
            lista.style.display = 'none'
        }
    }

    function mostrar(cp) {
        lista.style.display = 'none'
        alert("CP: " + cp)
    }

  </script>
</body>
</html>