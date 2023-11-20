document.addEventListener("DOMContentLoaded", ()=>{

    const button = document.getElementById("lookup")
    const input = document.getElementById("country")
    const resultDiv = document.getElementById("result")
    button.addEventListener("click", async ()=>{
        inputVal = input.value
        const result = await fetch(`http://localhost:8888/info2180-lab5/world.php?country=${inputVal}`)
        const data = await result.text()
        resultDiv.innerHTML = data
    })
})