const request = require('request');
const cheerio = require('cheerio');
const fs = require('fs');
const writeStream = fs.createWriteStream('AlleAusfaelle.csv');

//Write Headers
writeStream.write(`wochentag, alles \n`);

request('http://display.edubs.ch/fms1', (error, response, html) => {
    if(!error && response.statusCode == 200) {
      const $ = cheerio.load(html);

      $('.container').each((i,el) => {
        const alles = $(el)
          .find('div.panel.panel-default')
          .text()
          .replace(/\s\s+/g, ', \n');
          const wochentag = $(el)
          .find('h3')
          .text()
          .replace(/\s\s+/g, ', \n');

      //Write Row To CSV
      writeStream.write(`${wochentag}, ${alles} \n`);


    });

    console.log('Fertig...');
  }
});