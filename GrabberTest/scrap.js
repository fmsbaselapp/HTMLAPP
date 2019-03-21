const request = require('request');
const cheerio = require('cheerio')

request('http://display.edubs.ch/gl1', (error, response, html) => {
    if(!error && response.statusCode == 200) {
      const $ = cheerio.load(html);

      const container = $('.container');

      //console.log(container.html());
      //console.log(container.text());
      const output = container
        .find('h3')
        .next()
        .text();

      console.log(output);
    }
})