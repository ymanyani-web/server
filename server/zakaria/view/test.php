<form name="form" class="form-container" method="post" onsubmit="return doValidate()" id="myForm2">

                    <label> <input placeholder="Organisator" id="name" list="users" name="mitarbeiter" required /> </label> 
                         <datalist id="users" class="dle" >
                            <?php
                                for ($i=0; $i<$counts; $i++) {
                                    echo '<option value="'.$AllData[$i]["mail"][0].'">'.$AllData[$i]["cn"][0].'</option>'; 
                                }
                                
                            ?>
                            <option value="Chocolate">
                            <option value="Coconut">
                            <option value="Mint">
                            <option value="Strawberry">
                            <option value="Vanilla">
                         </datalist>
                    <br><br>


           
        </form>

<script>
        var input    = document.querySelector("#name"), // Selects the input.
    datalist = document.querySelector("datalist"); // Selects the datalist.
    input.addEventListener("keyup", (e) => {

// If input value is longer or equal than 2 chars, adding "users" on ID attribute.
if (e.target.value.length >= 3) {
    datalist.setAttribute("id", "users");
} else {
    datalist.setAttribute("id", "");
}
});
    </script>