window.onload = async function() {
    let response = await axios.get("./api/articles");
    console.log(response);
}