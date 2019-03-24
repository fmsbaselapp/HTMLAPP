const request = require('request');
const cheerio = require('cheerio')

request('http://display.edubs.ch/gl1', (error, response, html) => {
    if(!error && response.statusCode == 200) {
      const $ = cheerio.load(html);

      $('.panel-heading').each((i,el) => {
        const title = $(el).find('.text')
        .text()
        .find()

      console.log(title);
      });
    }
});