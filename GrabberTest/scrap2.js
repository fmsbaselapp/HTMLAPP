const request = require('request');
const cheerio = require('cheerio');
const fs = require('fs');
const writeStream = fs.createWriteStream('post.csv');

//Write Headers
writeStream.write(`wochentag,ausfall,raum,alles \n`);

request('http://display.edubs.ch/gm1', (error, response, html) => {
    if(!error && response.statusCode == 200) {
      const $ = cheerio.load(html);

      $('.container').each((i,el) => {
        const wochentag = $(el)
          .find('h3')
          .text()
          .replace(/\s\s+/g, ',');
        const ausfall = $(el)
          .find('div.panel-heading')
          .text()
          .replace(/\s\s+/g, ',');
        const raum = $(el)
          .find('div.panel-footer')
          .text()
          .replace(/\s\s+/g, ',');
        const alles = $(el)
          .find('div.panel.panel-default')
          .text()
          .replace(/\s\s+/g, ',');

      //Write Row To CSV
      writeStream.write(`${wochentag}, ${ausfall}, ${raum}, ${alles} \n`);


    });

    console.log('Fertig...');
  }
});