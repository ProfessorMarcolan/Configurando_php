const puppeteer = require("puppeteer");
 
 
(async () => {
 
    try {
 
        var browser = await puppeteer.launch({ headless: true });
        var page = await browser.newPage();
        await page.goto(`https://bulbapedia.bulbagarden.net/wiki/Pikachu_(Pok%C3%A9mon)`);
 
        var Pokemon = await page.evaluate(() => {
 
            var nome = document.querySelector(`#mw-content-text > table:nth-child(2) > tbody > tr:nth-child(1) > td > table > tbody > tr:nth-child(1) > td > table > tbody > tr > td:nth-child(1) > big > big > b`).textContent;
            var imagem = document.querySelector("#mw-content-text > table:nth-child(2) > tbody > tr:nth-child(1) > td > table > tbody > tr:nth-child(2) > td > table > tbody > tr:nth-child(1) > td > a > img").src
            var tipo = Array.from(document.querySelectorAll("#mw-content-text > table:nth-child(2) > tbody > tr:nth-child(2) > td > table > tbody > tr > td:nth-child(1) > table > tbody > tr > td:nth-child(1) > a > span > b")).map(el => el.textContent)
            var numero = document.querySelector("#mw-content-text > table:nth-child(2) > tbody > tr:nth-child(1) > td > table > tbody > tr:nth-child(1) > th > big > big > a > span").textContent
            var genero = Array.from(document.querySelectorAll("#mw-content-text > table:nth-child(2) > tbody > tr:nth-child(4) > td:nth-child(1) > table > tbody > tr:nth-child(2) > td > a > span")).filter(el => el.textContent != ',').map(el => el.textContent)
            return {
                nome,
                tipo,
                imagem,
                numero,
                genero
            };
 
        });
 
        console.log(Pokemon)
 
        await browser.close();
 
 
    } catch (err) {
 
        await browser.close();
    }
 
})();


// the fangu