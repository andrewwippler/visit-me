# Visit-me

[![CircleCI](https://circleci.com/gh/andrewwippler/visit-me.svg?style=svg)](https://circleci.com/gh/andrewwippler/visit-me)

Visit me is a replacement for [https://github.com/jdwfly/visits](jdwfly/visits)

## Setup

```bash
cd /var/www/html
git clone https://github.com/andrewwippler/visit-me.git
cd visit-me
cp .env{.example,}
# edit .env with database information
php artisan key:generate
composer install
php artisan migrate
php artisan db:seed
npm install
npm run production
```

## Todo

- [ ] Upload files
- [ ] Create printable page
- [ ] Create endpoint /genvisit?address1=123 La La Lane&city=Somewhere&state=MN&zip=55555

## License

Copyright 2018 Andrew Wippler

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
