const myHelper = {
    install(app) {
        app.config.globalProperties.$countDate = (value) => {
            const oneDay = 24 * 60 * 60 * 1000; // hours*minutes*seconds*milliseconds
            const firstDate = new Date();
            const secondDate = new Date(value);
            return Math.round(
                Math.abs((firstDate.getTime() - secondDate.getTime()) / oneDay),
            );
        };
    },
};
export default myHelper;
