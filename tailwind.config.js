const colors = require("tailwindcss/colors");

module.exports = {
  content: ["./src/**/*.{css,html,js,php}", "./dist/**/*.{css,html,js,php}"],
  theme: {
    extend: {},
  },
  plugins: [require("daisyui")],
};
