const ColorPicker = {
    init: () => {
        ColorPicker.action();
    },
    action: () => {
        acf.addFilter('color_picker_args', (args, field) => {
            console.log(args)
            args.palettes = ['#532B72', '#83A136', '#AA9439', '#000000', '#FFFFFF'];
            return args;
        });
    }
}

export default ColorPicker;