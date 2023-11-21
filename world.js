document.addEventListener("DOMContentLoaded", ()=>{

    const countryButton = document.getElementById("lookup-countries")
    const cityButton = document.getElementById("lookup-cities")
    const input = document.getElementById("country")
    const resultDiv = document.getElementById("result")
    countryButton.addEventListener("click", async (event)=>{
        event.preventDefault()
        resultDiv.replaceChildren()
        let inputVal = input.value
        const result = await fetch(`http://localhost:8888/info2180-lab5/world.php?country=${inputVal}`)
        const data = await result.text()
        resultDiv.innerHTML = data
    })
    cityButton.addEventListener("click", async (event)=>{
        event.preventDefault()
        resultDiv.replaceChildren()
        let inputVal = input.value
        const result = await fetch(`http://localhost:8888/info2180-lab5/world.php?country=${inputVal}&cities=${true}`)
        const data = await result.text()
        resultDiv.innerHTML = data
    })
})