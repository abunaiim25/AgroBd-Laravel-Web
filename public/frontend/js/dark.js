const options = {
    bottom: '20px', // default: '32px'
    right: 'unset', // default: '32px'
    left: '15px', // default: 'unset'
    time: '0.5s', // default: '0.3s'
    mixColor: '#fff!important', // default: '#fff'
    backgroundColor: '#fff!important',  // default: '#fff'
    buttonColorDark: '#100f2c!important',  // default: '#100f2c'
    buttonColorLight: '#fff!important', // default: '#fff'
    saveInCookies: false, // default: true,
    label: '🌓', // default: ''
    autoMatchOsTheme: true // default: true
  }
const darkmode = new Darkmode(options);
darkmode.showWidget();