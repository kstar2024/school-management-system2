<script>
function validateForm() {
    var dob = document.getElementById("dob").value;
    var currentDate = new Date();
    var threeYearsAgo = new Date();
    threeYearsAgo.setFullYear(currentDate.getFullYear() - 3);

    // Convert birthdate string to Date object
    var birthdateDate = new Date(dob);

    // Compare birthdate with three years ago
    if (birthdateDate < threeYearsAgo) {
        return true;  // Proceed with form submission
    } else {
        alert("Date of birth must be at least three years before today's date.");
        return false;  // Prevent form submission
    }
}
</script>