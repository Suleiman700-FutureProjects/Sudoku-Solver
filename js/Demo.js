const Demo1 = () => {
    const data = {
        'cell-3': 2,
        'cell-4': 6,
        'cell-6': 7,
        'cell-8': 1,
        'cell-9': 6,
        'cell-10': 8,
        'cell-13': 7,
        'cell-16': 9,
        'cell-18': 1,
        'cell-19': 9,
        'cell-23': 4,
        'cell-24': 5,
        'cell-27': 8,
        'cell-28': 2,
        'cell-30': 1,
        'cell-34': 4,
        'cell-38': 4,
        'cell-39': 6,
        'cell-41': 2,
        'cell-42': 9,
        'cell-46': 5,
        'cell-50': 3,
        'cell-52': 2,
        'cell-53': 8,
        'cell-56': 9,
        'cell-57': 3,
        'cell-61': 7,
        'cell-62': 4,
        'cell-64': 4,
        'cell-67': 5,
        'cell-70': 3,
        'cell-71': 6,
        'cell-72': 7,
        'cell-74': 3,
        'cell-76': 1,
        'cell-77': 8,
    }

    jQuery.each(data, function(cellID, value) {
        $(`#${cellID}`).val(value)
        $(`#${cellID}`).css('background', '#d7d7d7')
    });

}

const Demo2 = () => {
    const data = {
        'cell-1': 3,
        'cell-2': 4,
        'cell-3': 5,
        'cell-4': 8,
        'cell-5': 9,
        'cell-7': 2,
        'cell-14': 3,
        'cell-15': 4,
        'cell-16': 9,
        'cell-17': 7,
        'cell-19': 1,
        'cell-21': 7,
        'cell-23': 6,
        'cell-25': 8,
        'cell-26': 3,
        'cell-28': 6,
        'cell-32': 2,
        'cell-40': 5,
        'cell-43': 7,
        'cell-44': 8,
        'cell-46': 9,
        'cell-52': 4,
        'cell-53': 5,
        'cell-59': 7,
        'cell-61': 5,
        'cell-63': 8,
        'cell-64': 5,
        'cell-69': 7,
        'cell-73': 7,
        'cell-76': 6,
        'cell-78': 5,
        'cell-80': 9,
    }

    jQuery.each(data, function(cellID, value) {
        $(`#${cellID}`).val(value)
        $(`#${cellID}`).css('background', '#d7d7d7')
    });
}

export { Demo1, Demo2 }
