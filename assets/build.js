require.config({ 
    paths: {
        fdn: './js/foundation/foundationmin',
        a: './js/plugins',
        b: './js/main',
    }
});

require(['fdn', 'a', 'b'], function (fdn, a, b) {
    console.log(fdn);
    console.log(a);
    console.log(b);
});
