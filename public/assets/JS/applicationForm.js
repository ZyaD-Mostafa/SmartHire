document.getElementById("fileInput").addEventListener("change", function(){
    let fileName= this.files.length > 0 ? this.files[0].name : "No file chosen";

    document.getElementById("fileName").textContent = fileName;
});