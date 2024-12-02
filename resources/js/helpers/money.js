export const Money = {
    fromInt(value) {
        return new Intl.NumberFormat("pt-BR", {
            minimumFractionDigits: 2,
        }).format(parseFloat(value) / 100);
    },
};
