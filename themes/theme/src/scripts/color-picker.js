const ColorPicker = {
    init: () => {
        ColorPicker.action();
    },
    action: () => {
        acf.addFilter('color_picker_args', (args, field) => {
            console.log(args)
            args.palettes = ['#134740', '#BAD46E', '#EC6B48', '#000000', '#FFFFFF'];
            return args;
        });
    }
}

export default ColorPicker;