const request = require('request');
const cheerio = require('cheerio')

request('http://display.edubs.ch/gm1', (error, response, html) => {
    if(!error && response.statusCode == 200) {
      const $ = cheerio.load(html);

      $('.container').each((i,el) => {
        const wochentag = $(el)
        .find('h3')
        .text()
        .replace(/\s\s+/g, '');

      console.log(wochentag);
      });

      $('.container').each((i,el) => {
        const ausfall = $(el)
        .find('div.panel-heading')
        .text()
        .replace(/\s\s+/g, '');

      console.log(ausfall);
    });

      $('.container').each((i,el) => {
        const raum = $(el)
        .find('div.panel-footer')
        .text()
        .replace(/\s\s+/g, '');

      console.log(raum);
    });

    }
});