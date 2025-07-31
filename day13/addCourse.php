<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/master.css">
    <link rel="stylesheet" href="./css/all.min.css">
    <link rel="stylesheet" href="./css/normalize.css">
</head>

<body class="main-bg  flex-column m-auto ">
    <div class="container  center " style="min-height: 90vh;">
        <div class="row">
            <div class="col ">
                <div class="card shape w-75 p-5 mx-auto myShadow" style=" background-color: #12988d;">
                    <form action="" method="post" class="was-validated p-5 bg-light shape " id="addCourse">
                        <h3 class="text-center text-success fw-bold">Add Course </h3>
                        <div class="error"> </div>
                        <section class="mt-4">
                            <!-- <label for="title" class="form-label">Course Title</label> -->
                            <input placeholder="Add course Title" type="text" name="title" id="title"
                                class="is-valid form-control" required>
                        </section>
                        <section class="mt-4">
                            <!-- <label for="desc" class="form-label">Course Description</label> -->
                            <textarea placeholder="Add course Descreption" name="desc" id="desc"
                                class="is-valid form-control" required></textarea>
                        </section>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <section class="mt-4">
                                    <!-- <label for="hours" class="form-label">Course Hours</label> -->
                                    <input placeholder="add the Course hours" type="number" step="0.5" min="0"
                                        name="hours" id="hours" class="is-valid form-control" required>
                                </section>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <section class="mt-4">
                                    <!-- <label for="price" class="form-label">Course Price</label> -->
                                    <input placeholder="add course price " type="number" step="0.5" min="0" name="price"
                                        id="price" class="is-valid form-control" required>
                                </section>
                            </div>
                        </div>
                        <section class="text-center mt-3">
                            <input type="hidden" name="added" value="1">
                            <input type="submit" value="Add Course " id="add"
                                class="btn shape btn-danger text-light p-2 w-100 mt-2">
                        </section>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        let form = document.getElementById('addCourse');
        let title = document.getElementById('title');
        let desc = document.getElementById('desc');
        let hours = document.getElementById('hours');
        let price = document.getElementById('price');
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            fetch('./post.php', {
                method: 'POST',
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({
                    type: 'coursdata',
                    title: title.value,
                    desc: desc.value,
                    hours: hours.value,
                    price: price.value
                })
            }).then(res => res.json())
                .then(data => {
                    console.log(data);
                    let err = document.querySelector('.error')
                    if (data.success == true) {
                        window.alert(data.message);
                        title.value = '';
                        desc.value = '';
                        hours.value = '';
                        price.value = '';
                        err.innerHTML = '';
                    } else {
                        // let err = document.querySelector('.error')
                        err.innerHTML = `
                
                <div class='alert alert-danger text-center'>${data.message}</div>
                `;
                    }
                })
        })
    </script>

</body>

</html>