const request = require('request');
const cheerio = require('cheerio');
const fs = require('fs');
const writeStream = fs.createWriteStream('AlleAusfaelle.csv');

//Write Headers
writeStream.write(`wochentag,ausfall,raum \n`);

request('http://display.edubs.ch/gl1', (error, response, html) => {
    if(!error && response.statusCode == 200) {
      const $ = cheerio.load(html);

      $('.container').each((i,el) => {
        const wochentag = $(el)
          .find('h3')
          .text()
          .replace(/\s\s+/g, ', \n');
        const ausfall = $(el)
          .find('div.panel-heading')
          .text()
          .replace(/\s\s+/g, ', \n');
        const raum = $(el)
          .find('div.panel-footer')
          .text()
          .replace(/\s\s+/g, ', \n');

      //Write Row To CSV
      writeStream.write(`${wochentag}, ${ausfall}, ${raum} \n`);


    });

    console.log('Fertig...');
  }
});