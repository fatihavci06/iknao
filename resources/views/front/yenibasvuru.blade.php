@extends('layouts.front.master')
@section('style')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap');

        /* ==========================================================================
           Variables
           ========================================================================== */

        :root {

            /* --- Colors --- */

            --light-blue-100: 199, 84%, 55%; /* #2bb0ed */
            --light-blue-500: 202, 83%, 41%; /* #127fbf */
            --light-blue-900: 204, 96%, 27%; /* #035388 */

            --blue-100:       210, 22%, 49%; /* #627d98 */
            --blue-500:       209, 34%, 30%; /* #334e68 */
            --blue-900:       209, 61%, 16%; /* #102a43 */

            --gray-100:       210, 36%, 96%; /* #f0f4F8 */
            --gray-300:       212, 33%, 89%; /* #d9e2ec */
            --gray-500:       210, 31%, 80%; /* #bcccdc */
            --gray-700:       211, 27%, 70%; /* #9fb3c8 */
            --gray-900:       209, 23%, 60%; /* #829ab1 */

            --white:          0, 0%, 100%;   /* #ffffff */

            /* --- Typography --- */

            --font-family-sans-serif: "Montserrat", sans-serif;

            /* --- Layout --- */

            --space-multiplier:  0.8;

            --content-max-width: 140rem;

            --grid-spacer-width: 1.5rem;
            --grid-column-count: 12;

        }

        /* ==========================================================================
           Base
           ========================================================================== */

        /**
         * Reset box-sizing on all elements
         *
         * `border-box` includes padding and border in the calculations for total
         * width, height values. This is more predictable than the default
         * `content-box`, which does the opposite.
         *
         * 1. Apply `inherit` to all elements (global selector)
         * 2. Apply the same with a global selector for pseudo-elements
         */

        * {
            box-sizing: inherit; /* 1 */
        }

        *::before,
        *::after {
            box-sizing: inherit; /* 2 */
        }

        /**
         * 1. Now add `border-box` to `html`, which will cascade down through all
         *    elements, but leaves box-sizing easy to overwrite on a parent component
         *
         *    https://css-tricks.com/inheriting-box-sizing-probably-slightly-better-best-practice/
         *
         * 2. Set `html` font size to 62.5%, equal to 10px or 1rem
         *
         *    https://css-tricks.com/accessible-font-sizing-explained/
         *
         * 3. Set up full viewport height for sticky footer
         * 4. Prevent font size adjustment after orientation change in iOS
         */

        html {
            box-sizing: border-box; /* 1 */
            font-size: 62.5%; /* 2 */
            height: 100%; /* 3 */
            -webkit-text-size-adjust: 100%; /* 4 */
        }

        :focus-visible {
            outline: hsl(var(--light-blue-900)) auto 1px;
            outline-offset: 0;
        }



        /* ==========================================================================
           Accessibility
           ========================================================================== */

        /* Visibility
           ========================================================================== */

        /**
         * Visually hidden class
         *
         * Hides content to visual users, but leaves it accessible to screen reader
         * users. The combination of these properties will ensure that the element
         * is truly hidden and not getting smushed in the corner of the screen.
         *
         * https://snook.ca/archives/html_and_css/hiding-content-for-accessibility
         *
         * 1. For long content, line feeds are not interpreted as spaces and small width
         *    causes content to wrap 1 word per line:
         *
         *    https://medium.com/@jessebeach/beware-smushed-off-screen-accessible-text-5952a4c2cbfe
         */

        .visually-hidden {
            border: 0;
            clip: rect(1px, 1px, 1px, 1px);
            clip-path: inset(50%);
            height: 1px;
            margin: -1px;
            overflow: hidden;
            padding: 0;
            position: absolute !important;
            white-space: nowrap; /* 1 */
            width: 1px;
        }

        /* ==========================================================================
           CSS Flex
           ========================================================================== */

        /* Flex Parent
           ========================================================================== */

        /**
         * These classes are named in the format `{breakpoint}:flex-{property}`
         *
         * Where `{breakpoint}` is one of sm, md, or lg
         *
         * Where `{property}` is one of:
         *    row
         *    row-reverse
         *    column
         *    column-reverse
         *    wrap
         *    wrap-reverse
         *    wrap-nowrap
         */

        .flex-row {
            flex-direction: row;
        }

        .flex-row-reverse {
            flex-direction: row-reverse;
        }

        .flex-column {
            flex-direction: column;
        }

        .flex-column-reverse {
            flex-direction: column-reverse;
        }

        .flex-wrap {
            flex-wrap: wrap;
        }

        .flex-wrap-reverse {
            flex-wrap: wrap-reverse;
        }

        .flex-wrap-nowrap {
            flex-wrap: nowrap;
        }

        @media only screen and (min-width: 640px) {
            .sm\:flex-row {
                flex-direction: row;
            }

            .sm\:flex-row-reverse {
                flex-direction: row-reverse;
            }

            .sm\:flex-column {
                flex-direction: column;
            }

            .sm\:flex-column-reverse {
                flex-direction: column-reverse;
            }

            .sm\:flex-wrap {
                flex-wrap: wrap;
            }

            .sm\:flex-wrap-reverse {
                flex-wrap: wrap-reverse;
            }

            .sm\:flex-wrap-nowrap {
                flex-wrap: nowrap;
            }
        }

        @media only screen and (min-width: 940px) {
            .md\:flex-row {
                flex-direction: row;
            }

            .md\:flex-row-reverse {
                flex-direction: row-reverse;
            }

            .md\:flex-column {
                flex-direction: column;
            }

            .md\:flex-column-reverse {
                flex-direction: column-reverse;
            }

            .md\:flex-wrap {
                flex-wrap: wrap;
            }

            .md\:flex-wrap-reverse {
                flex-wrap: wrap-reverse;
            }

            .md\:flex-wrap-nowrap {
                flex-wrap: nowrap;
            }
        }

        @media only screen and (min-width: 1240px) {
            .lg\:flex-row {
                flex-direction: row;
            }

            .lg\:flex-row-reverse {
                flex-direction: row-reverse;
            }

            .lg\:flex-column {
                flex-direction: column;
            }

            .lg\:flex-column-reverse {
                flex-direction: column-reverse;
            }

            .lg\:flex-wrap {
                flex-wrap: wrap;
            }

            .lg\:flex-wrap-reverse {
                flex-wrap: wrap-reverse;
            }

            .lg\:flex-wrap-nowrap {
                flex-wrap: nowrap;
            }
        }

        /* Flex Children
           ========================================================================== */

        /**
         * These classes are named in the format `{breakpoint}:flex-{property}`
         *
         * Where `{breakpoint}` is one of sm, md, or lg
         *
         * Where `{property}` is one of:
         *    1 - Allows the flex item the grow and shrink, 0% basis
         *    auto - Allows the flex item to grow and shrink, auto basis
         *    initial - Allows the flex item to shrink but not grow, auto basis
         *    none - Prevents the flex item from growing or shrinking
         */

        .flex-1 {
            flex: 1 1 0%;
        }

        .flex-auto {
            flex: 1 1 auto;
        }

        .flex-initial {
            flex: 0 1 auto;
        }

        .flex-none {
            flex: none;
        }

        @media only screen and (min-width: 640px) {
            .sm\:flex-1 {
                flex: 1 1 0%;
            }

            .sm\:flex-auto {
                flex: 1 1 auto;
            }

            .sm\:flex-initial {
                flex: 0 1 auto;
            }

            .sm\:flex-none {
                flex: none;
            }
        }

        @media only screen and (min-width: 940px) {
            .md\:flex-1 {
                flex: 1 1 0%;
            }

            .md\:flex-auto {
                flex: 1 1 auto;
            }

            .md\:flex-initial {
                flex: 0 1 auto;
            }

            .md\:flex-none {
                flex: none;
            }
        }

        @media only screen and (min-width: 1240px) {
            .lg\:flex-1 {
                flex: 1 1 0%;
            }

            .lg\:flex-auto {
                flex: 1 1 auto;
            }

            .lg\:flex-initial {
                flex: 0 1 auto;
            }

            .lg\:flex-none {
                flex: none;
            }
        }

        /* ==========================================================================
           CSS Grid
           ========================================================================== */

        /* Grid Children
           ========================================================================== */

        /**
         * These classes are named in the format `{breakpoint}:col-{count}`
         *
         * Where `{breakpoint}` is one of sm, md, or lg
         *
         * Where `{count}` is a number 1 - 6
         */

        .grid-col-1 {
            grid-template-columns: 1fr;
        }

        .grid-col-2 {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .grid-col-3 {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }

        .grid-col-4 {
            grid-template-columns: repeat(4, minmax(0, 1fr));
        }

        .grid-col-5 {
            grid-template-columns: repeat(5, minmax(0, 1fr));
        }

        .grid-col-6 {
            grid-template-columns: repeat(6, minmax(0, 1fr));
        }

        @media only screen and (min-width: 640px) {
            .sm\:grid-col-1 {
                grid-template-columns: 1fr;
            }

            .sm\:grid-col-2 {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .sm\:grid-col-3 {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }

            .sm\:grid-col-4 {
                grid-template-columns: repeat(4, minmax(0, 1fr));
            }

            .sm\:grid-col-5 {
                grid-template-columns: repeat(5, minmax(0, 1fr));
            }

            .sm\:grid-col-6 {
                grid-template-columns: repeat(6, minmax(0, 1fr));
            }
        }

        @media only screen and (min-width: 940px) {
            .md\:grid-col-1 {
                grid-template-columns: 1fr;
            }

            .md\:grid-col-2 {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .md\:grid-col-3 {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }

            .md\:grid-col-4 {
                grid-template-columns: repeat(4, minmax(0, 1fr));
            }

            .md\:grid-col-5 {
                grid-template-columns: repeat(5, minmax(0, 1fr));
            }

            .md\:grid-col-6 {
                grid-template-columns: repeat(6, minmax(0, 1fr));
            }
        }

        @media only screen and (min-width: 1240px) {
            .lg\:grid-col-1 {
                grid-template-columns: 1fr;
            }

            .lg\:grid-col-2 {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .lg\:grid-col-3 {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }

            .lg\:grid-col-4 {
                grid-template-columns: repeat(4, minmax(0, 1fr));
            }

            .lg\:grid-col-5 {
                grid-template-columns: repeat(5, minmax(0, 1fr));
            }

            .lg\:grid-col-6 {
                grid-template-columns: repeat(6, minmax(0, 1fr));
            }
        }

        /* ==========================================================================
           CSS Layout
           ========================================================================== */

        /* Alignment (Parent)
           ========================================================================== */

        .justify-start {
            justify-content: start;
        }

        .justify-end {
            justify-content: end;
        }

        .justify-center {
            justify-content: center;
        }

        .justify-space-between {
            justify-content: space-between;
        }

        .justify-space-around {
            justify-content: space-around;
        }

        .justify-space-evenly {
            justify-content: space-evenly;
        }

        .align-items-start {
            align-items: start;
        }

        .align-items-end {
            align-items: end;
        }

        .align-items-center {
            align-items: center;
        }

        .align-items-stretch {
            align-items: stretch;
        }

        .align-items-baseline {
            align-items: baseline;
        }

        @media only screen and (min-width: 640px) {
            .sm\:justify-start {
                justify-content: start;
            }

            .sm\:justify-end {
                justify-content: end;
            }

            .sm\:justify-center {
                justify-content: center;
            }

            .sm\:justify-space-between {
                justify-content: space-between;
            }

            .sm\:justify-space-around {
                justify-content: space-around;
            }

            .sm\:justify-space-evenly {
                justify-content: space-evenly;
            }

            .sm\:align-items-start {
                align-items: start;
            }

            .sm\:align-items-end {
                align-items: end;
            }

            .sm\:align-items-center {
                align-items: center;
            }

            .sm\:align-items-stretch {
                align-items: stretch;
            }

            .sm\:align-items-baseline {
                align-items: baseline;
            }
        }

        @media only screen and (min-width: 940px) {
            .md\:justify-start {
                justify-content: start;
            }

            .md\:justify-end {
                justify-content: end;
            }

            .md\:justify-center {
                justify-content: center;
            }

            .md\:justify-space-between {
                justify-content: space-between;
            }

            .md\:justify-space-around {
                justify-content: space-around;
            }

            .md\:justify-space-evenly {
                justify-content: space-evenly;
            }

            .md\:align-items-start {
                align-items: start;
            }

            .md\:align-items-end {
                align-items: end;
            }

            .md\:align-items-center {
                align-items: center;
            }

            .md\:align-items-stretch {
                align-items: stretch;
            }

            .md\:align-items-baseline {
                align-items: baseline;
            }
        }

        @media only screen and (min-width: 1240px) {
            .lg\:justify-start {
                justify-content: start;
            }

            .lg\:justify-end {
                justify-content: end;
            }

            .lg\:justify-center {
                justify-content: center;
            }

            .lg\:justify-space-between {
                justify-content: space-between;
            }

            .lg\:justify-space-around {
                justify-content: space-around;
            }

            .lg\:justify-space-evenly {
                justify-content: space-evenly;
            }

            .lg\:align-items-start {
                align-items: start;
            }

            .lg\:align-items-end {
                align-items: end;
            }

            .lg\:align-items-center {
                align-items: center;
            }

            .lg\:align-items-stretch {
                align-items: stretch;
            }

            .lg\:align-items-baseline {
                align-items: baseline;
            }
        }

        /* ==========================================================================
           Display
           ========================================================================== */

        /**
         * These classes are named in the format `{breakpoint}:d-{value}`
         *
         * Where `{breakpoint}` is one of sm, md, or lg
         *
         * Where `{value}` is one of:
         *    none
         *    inline
         *    inline-block
         *    block
         *    flex
         *    inline-flex
         */

        .d-none {
            display: none;
        }

        .d-inline {
            display: inline;
        }

        .d-inline-block {
            display: inline-block;
        }

        .d-block {
            display: block;
        }

        .d-flex {
            column-gap: calc(var(--grid-spacer-width) * 2);
            display: flex;
        }

        .d-inline-flex {
            column-gap: calc(var(--grid-spacer-width) * 2);
            display: inline-flex;
        }

        .d-grid {
            column-gap: calc(var(--grid-spacer-width) * 2);
            display: grid;
        }

        .d-inline-grid {
            column-gap: calc(var(--grid-spacer-width) * 2);
            display: inline-grid;
        }

        @media only screen and (min-width: 640px) {
            .sm\:d-none {
                display: none;
            }

            .sm\:d-inline {
                display: inline;
            }

            .sm\:d-inline-block {
                display: inline-block;
            }

            .sm\:d-block {
                display: block;
            }

            .sm\:d-flex {
                column-gap: calc(var(--grid-spacer-width) * 2);
                display: flex;
            }

            .sm\:d-inline-flex {
                column-gap: calc(var(--grid-spacer-width) * 2);
                display: inline-flex;
            }

            .sm\:d-grid {
                column-gap: calc(var(--grid-spacer-width) * 2);
                display: grid;
            }

            .sm\:d-inline-grid {
                column-gap: calc(var(--grid-spacer-width) * 2);
                display: inline-grid;
            }
        }

        @media only screen and (min-width: 940px) {
            .md\:d-none {
                display: none;
            }

            .md\:d-inline {
                display: inline;
            }

            .md\:d-inline-block {
                display: inline-block;
            }

            .md\:d-block {
                display: block;
            }

            .md\:d-flex {
                column-gap: calc(var(--grid-spacer-width) * 2);
                display: flex;
            }

            .md\:d-inline-flex {
                column-gap: calc(var(--grid-spacer-width) * 2);
                display: inline-flex;
            }

            .md\:d-grid {
                column-gap: calc(var(--grid-spacer-width) * 2);
                display: grid;
            }

            .md\:d-inline-grid {
                column-gap: calc(var(--grid-spacer-width) * 2);
                display: inline-grid;
            }
        }

        @media only screen and (min-width: 1240px) {
            .lg\:d-none {
                display: none;
            }

            .lg\:d-inline {
                display: inline;
            }

            .lg\:d-inline-block {
                display: inline-block;
            }

            .lg\:d-block {
                display: block;
            }

            .lg\:d-flex {
                column-gap: calc(var(--grid-spacer-width) * 2);
                display: flex;
            }

            .lg\:d-inline-flex {
                column-gap: calc(var(--grid-spacer-width) * 2);
                display: inline-flex;
            }

            .lg\:d-grid {
                column-gap: calc(var(--grid-spacer-width) * 2);
                display: grid;
            }

            .lg\:d-inline-grid {
                column-gap: calc(var(--grid-spacer-width) * 2);
                display: inline-grid;
            }
        }

        /* ==========================================================================
           Typography
           ========================================================================== */

        /* Paragraphs
           ========================================================================== */

        p {
            font-size: 1.4rem;
            margin: 0;
        }

        * + p {
            margin-top: 1.25em;
        }

        ul + p,
        ol + p {
            margin-top: 2em;
        }

        @media only screen and (min-width: 940px) {
            p {
                font-size: 1.6rem;
            }
        }

        /* Lists
           ========================================================================== */







        .list-unstyled {
            list-style: none;
            margin: 0;
            padding-left: 0;
        }

        .list-unstyled li + li {
            margin-top: 0;
        }

        @media only screen and (min-width: 940px) {
            ul,
            ol {
                font-size: 1.6rem;
            }
        }

        /* Links
           ========================================================================== */



        a:active,


        a:hover,
        a:focus {
            color: hsl(var(--light-blue-500));
        }

        /* ==========================================================================
           Forms
           ========================================================================== */

        :root {

            --form-accent-color: var(--light-blue-500);
            --form-error-color: 356, 75%, 53%; /* #e12d39 */

            /* --- Fields --- */

            --field-background-color: hsl(var(--white));
            --field-border-width: 1px;
            --field-border-style: solid;
            --field-border-color: hsl(var(--gray-500));
            --field-border: var(--field-border-width)
            var(--field-border-style)
            var(--field-border-color);
            --field-border-radius: 3px;
            --field-height: 2.2rem;
            --field-padding: 0 calc(var(--space-multiplier) * 2rem);
            --field-text-color: hsl(var(--blue-900));
            --field-text-font-family: var(--font-family-sans-serif);
            --field-text-font-size: 1.4rem;
            --field-text-font-weight: 500;
            --field-text-letter-spacing: 0.05em;

            /* --- Labels --- */

            --label-text-color: hsl(var(--blue-900));
            --label-text-font-family: var(--font-family-sans-serif);
            --label-text-font-size: 1.4rem;
            --label-text-font-weight: 600;
            --label-text-letter-spacing: 0.05em;

            /* --- Error Text ---*/

            --error-text-color: hsl(var(--form-error-color));
            --error-text-font-family: var(--font-family-sans-serif);
            --error-text-font-size: 1.2rem;
            --error-text-font-weight: 500;
            --error-text-letter-spacing: 0.05em;

        }

        @media only screen and (min-width: 640px) {
            :root {
                --field-height: 2.7rem;
            }
        }

        /* Fieldset
           ========================================================================== */

        fieldset {
            border: 0;
            margin: 0;
            padding: 0;
        }

        /* Labels
           ========================================================================== */

        label,
        legend {
            color: var(--label-text-color);
            font-family: var(--label-text-font-family);
            font-size: var(--label-text-font-size);
            font-weight: var(--label-text-font-weight);
            display: block;
            letter-spacing: var(--label-text-letter-spacing);
            line-height: 1.6;
            padding-bottom: calc(var(--space-multiplier) * 1rem);
            position: relative;
        }

        label > [data-required="true"]::after,
        legend > [data-required="true"]::after {
            color: hsl(var(--form-error-color));
            content: "*";
            padding-left: 0.25em;
            position: absolute;
        }

        /* Fields
           ========================================================================== */

        [multiple],
        [type="date"],
        [type="datetime-local"],
        [type="email"],
        [type="month"],
        [type="number"],
        [type="password"],
        [type="search"],
        [type="tel"],
        [type="text"],
        [type="time"],
        [type="url"],
        [type="week"],
        select,
        textarea {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            background: none;
            background-color: var(--field-background-color);
            border: var(--field-border);
            border-radius: var(--field-border-radius);
            color: var(--field-text-color);
            display: block;
            font-family: var(--field-text-font-family);
            font-size: var(--field-text-font-size);
            font-weight: var(--field-text-font-weight);
            letter-spacing: var(--field-text-letter-spacing);
            width: 100% !important;
        }

        [multiple],
        [type="date"],
        [type="datetime-local"],
        [type="email"],
        [type="month"],
        [type="number"],
        [type="password"],
        [type="search"],
        [type="tel"],
        [type="text"],
        [type="time"],
        [type="url"],
        [type="week"],
        select {

            padding: var(--field-padding);
        }

        select {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 448 512'%3E%3Cpath fill='hsl(0, 0%, 13%)' d='M224 416c-8.188 0-16.38-3.125-22.62-9.375l-192-192c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L224 338.8l169.4-169.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-192 192C240.4 412.9 232.2 416 224 416z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 2rem center;
            background-size: 0.7em auto;
            padding-right: 5rem;
        }

        textarea {
            --field-padding: calc(var(--space-multiplier) * 2rem);
            padding: var(--field-padding);
            resize: vertical;
        }

        /* --- Checkbox and Radio --- */

        .form__choice-wrapper {
            --label-text-font-weight: 500;
            column-gap: 1.5rem;
            display: grid;
            grid-template-columns: min-content 1fr;
            padding: 0;
        }

        .form__choice-wrapper + .form__choice-wrapper {
            margin-top: calc(var(--space-multiplier) * 1rem);
        }




        select[aria-invalid="true"] {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 448 512'%3E%3Cpath fill='hsl(356, 75%, 53%)' d='M224 416c-8.188 0-16.38-3.125-22.62-9.375l-192-192c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L224 338.8l169.4-169.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-192 192C240.4 412.9 232.2 416 224 416z'/%3E%3C/svg%3E");
        }

        /* --- Error Text --- */

        .form__error-text {
            color: var(--error-text-color);
            font-family: var(--error-text-font-family);
            font-size: var(--error-text-font-size);
            font-weight: var(--error-text-font-weight);
            letter-spacing: var(--error-text-letter-spacing);
            line-height: 1.6;
            margin-top: calc(var(--space-multiplier) * 1rem);
        }

        /* ==========================================================================
           Buttons
           ========================================================================== */

        :root {
            --button-background-color: hsl(var(--blue-900));
            --button-border-width: 1px;
            --button-border-style: solid;
            --button-border-color: transparent;
            --button-border: var(--button-border-width)
            var(--button-border-style)
            var(--button-border-color);
            --button-border-radius: 4px;
            --button-height: 4.2rem;
            --button-padding: 0 calc(var(--space-multiplier) * 2rem);
            --button-text-align: center;
            --button-text-color: hsl(var(--white));
            --button-text-decoration: none;
            --button-text-font-family: var(--font-family-sans-serif);
            --button-text-font-size: 1.6rem;
            --button-text-font-weight: 600;
            --button-text-letter-spacing: 0.05em;
            --button-text-shadow: 0 1px hsla(0, 0%, 20%, 0.2);
        }

        @media only screen and (min-width: 640px) {
            :root {
                --button-height: 4.6rem;
                --button-padding: 0 calc(var(--space-multiplier) * 3rem);
            }
        }

        button {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            background: none;
            background-color: var(--button-background-color);
            border: var(--button-border);
            border-radius: var(--button-border-radius);
            color: var(--button-text-color);
            display: block;
            font-family: var(--button-text-font-family);
            font-size: var(--button-text-font-size);
            font-weight: var(--button-text-font-weight);
            letter-spacing: var(--button-text-letter-spacing);
            line-height: var(--button-height);
            padding: var(--button-padding);
            text-align: var(--button-text-align);
            text-decoration: var(--button-text-decoration);
            text-shadow: var(--button-text-shadow);
            transition: background-color 0.2s ease-in-out,
            border-color 0.2s ease-in-out,
            color 0.2s ease-in-out,
            text-shadow 0.2s ease-in-out;
            white-space: nowrap;

        }

        button:active {
            transform: translateY(1px);
        }

        button:hover,
        button:focus {
            background-color: hsl(var(--light-blue-900));
            color: hsl(var(--white));
        }

        button:focus-visible {
            outline-offset: 4px;
        }

        button.disabled,
        button:disabled {
            background-color: hsl(var(--gray-900));
        }

        @media only screen and (min-width: 640px) {
            button {
                display: inline-block;
                vertical-align: top;
                width: auto;
            }
        }

        /* --- Simple Buttons --- */

        .button--simple,
        .button--simple:active,
        .button--simple:visited {
            background-color: transparent;
            color: hsl(var(--blue-900));
            text-shadow: none;
        }

        .button--simple:hover,
        .button--simple:focus {
            background-color: transparent;
            color: hsl(var(--light-blue-900));
        }

        /* ==========================================================================
           Container
           ========================================================================== */

        .test12 {
            max-width: 80rem; /* 800px */
            width: 100%;
        }

        /* ==========================================================================
           Spacing
           ========================================================================== */

        /**
         * These classes are named in the format
         *    `{breakpoint}:{property}{side?s}-{size}`
         *
         * Where `{breakpoint}` is one of sm, md, or lg
         *
         * Where `{property}` is one of:
         *    m - sets margin
         *    p - sets padding
         *
         * Where `{sides}` is one of:
         *    t - sets top only
         *    b - sets bottom only
         *    l - sets left only
         *    r - sets right only
         *    x - sets both left and right
         *    y - sets both top and bottom
         *    blank - sets all four sides
         *
         * Where `{size}` is one of the following as a multiple of 0.8:
         *    0 - sets spacing to 0 * 0.8 (0)
         *    1 - sets spacing to 1 * 0.8 (0.8rem)
         *    2 - sets spacing to 2 * 0.8 (1.6rem)
         *    3 - sets spacing to 3 * 0.8 (2.4rem)
         *    4 - sets spacing to 4 * 0.8 (3.2rem)
         *    5 - sets spacing to 5 * 0.8 (4.0rem)
         *    6 - sets spacing to 6 * 0.8 (4.8rem)
         *    auto - sets spacing to auto (margin only)
         */

        .m-0 {
            margin: 0;
        }

        .m-1 {
            margin: calc(var(--space-multiplier) * 1rem);
        }

        .m-2 {
            margin: calc(var(--space-multiplier) * 2rem);
        }

        .m-3 {
            margin: calc(var(--space-multiplier) * 3rem);
        }

        .m-4 {
            margin: calc(var(--space-multiplier) * 4rem);
        }

        .m-5 {
            margin: calc(var(--space-multiplier) * 5rem);
        }

        .m-6 {
            margin: calc(var(--space-multiplier) * 6rem);
        }

        .m-auto {
            margin: auto;
        }

        .mt-0 {
            margin-top: 0;
        }

        .mt-1 {
            margin-top: calc(var(--space-multiplier) * 1rem);
        }

        .mt-2 {
            margin-top: calc(var(--space-multiplier) * 2rem);
        }

        .mt-3 {
            margin-top: calc(var(--space-multiplier) * 3rem);
        }

        .mt-4 {
            margin-top: calc(var(--space-multiplier) * 4rem);
        }

        .mt-5 {
            margin-top: calc(var(--space-multiplier) * 5rem);
        }

        .mt-6 {
            margin-top: calc(var(--space-multiplier) * 6rem);
        }

        .mt-auto {
            margin-top: auto;
        }

        .mb-0 {
            margin-bottom: 0;
        }

        .mb-1 {
            margin-bottom: calc(var(--space-multiplier) * 1rem);
        }

        .mb-2 {
            margin-bottom: calc(var(--space-multiplier) * 2rem);
        }

        .mb-3 {
            margin-bottom: calc(var(--space-multiplier) * 3rem);
        }

        .mb-4 {
            margin-bottom: calc(var(--space-multiplier) * 4rem);
        }

        .mb-5 {
            margin-bottom: calc(var(--space-multiplier) * 5rem);
        }

        .mb-6 {
            margin-bottom: calc(var(--space-multiplier) * 6rem);
        }

        .mb-auto {
            margin-bottom: auto;
        }

        .ml-0 {
            margin-left: 0;
        }

        .ml-1 {
            margin-left: calc(var(--space-multiplier) * 1rem);
        }

        .ml-2 {
            margin-left: calc(var(--space-multiplier) * 2rem);
        }

        .ml-3 {
            margin-left: calc(var(--space-multiplier) * 3rem);
        }

        .ml-4 {
            margin-left: calc(var(--space-multiplier) * 4rem);
        }

        .ml-5 {
            margin-left: calc(var(--space-multiplier) * 5rem);
        }

        .ml-6 {
            margin-left: calc(var(--space-multiplier) * 6rem);
        }

        .ml-auto {
            margin-left: auto;
        }

        .mr-0 {
            margin-right: 0;
        }

        .mr-1 {
            margin-right: calc(var(--space-multiplier) * 1rem);
        }

        .mr-2 {
            margin-right: calc(var(--space-multiplier) * 2rem);
        }

        .mr-3 {
            margin-right: calc(var(--space-multiplier) * 3rem);
        }

        .mr-4 {
            margin-right: calc(var(--space-multiplier) * 4rem);
        }

        .mr-5 {
            margin-right: calc(var(--space-multiplier) * 5rem);
        }

        .mr-6 {
            margin-right: calc(var(--space-multiplier) * 6rem);
        }

        .mr-auto {
            margin-right: auto;
        }

        .mx-0 {
            margin-left: 0;
            margin-right: 0;
        }

        .mx-1 {
            margin-left: calc(var(--space-multiplier) * 1rem);
            margin-right: calc(var(--space-multiplier) * 1rem);
        }

        .mx-2 {
            margin-left: calc(var(--space-multiplier) * 2rem);
            margin-right: calc(var(--space-multiplier) * 2rem);
        }

        .mx-3 {
            margin-left: calc(var(--space-multiplier) * 3rem);
            margin-right: calc(var(--space-multiplier) * 3rem);
        }

        .mx-4 {
            margin-left: calc(var(--space-multiplier) * 4rem);
            margin-right: calc(var(--space-multiplier) * 4rem);
        }

        .mx-5 {
            margin-left: calc(var(--space-multiplier) * 5rem);
            margin-right: calc(var(--space-multiplier) * 5rem);
        }

        .mx-6 {
            margin-left: calc(var(--space-multiplier) * 6rem);
            margin-right: calc(var(--space-multiplier) * 6rem);
        }

        .mx-auto {
            margin-left: auto;
            margin-right: auto;
        }

        .my-0 {
            margin-top: 0;
            margin-bottom: 0;
        }

        .my-1 {
            margin-top: calc(var(--space-multiplier) * 1rem);
            margin-bottom: calc(var(--space-multiplier) * 1rem);
        }

        .my-2 {
            margin-top: calc(var(--space-multiplier) * 2rem);
            margin-bottom: calc(var(--space-multiplier) * 2rem);
        }

        .my-3 {
            margin-top: calc(var(--space-multiplier) * 3rem);
            margin-bottom: calc(var(--space-multiplier) * 3rem);
        }

        .my-4 {
            margin-top: calc(var(--space-multiplier) * 4rem);
            margin-bottom: calc(var(--space-multiplier) * 4rem);
        }

        .my-5 {
            margin-top: calc(var(--space-multiplier) * 5rem);
            margin-bottom: calc(var(--space-multiplier) * 5rem);
        }

        .my-6 {
            margin-top: calc(var(--space-multiplier) * 6rem);
            margin-bottom: calc(var(--space-multiplier) * 6rem);
        }

        .my-auto {
            margin-top: auto;
            margin-bottom: auto;
        }

        @media only screen and (min-width: 640px) {
            .sm\:m-0 {
                margin: 0;
            }

            .sm\:m-1 {
                margin: calc(var(--space-multiplier) * 1rem);
            }

            .sm\:m-2 {
                margin: calc(var(--space-multiplier) * 2rem);
            }

            .sm\:m-3 {
                margin: calc(var(--space-multiplier) * 3rem);
            }

            .sm\:m-4 {
                margin: calc(var(--space-multiplier) * 4rem);
            }

            .sm\:m-5 {
                margin: calc(var(--space-multiplier) * 5rem);
            }

            .sm\:m-6 {
                margin: calc(var(--space-multiplier) * 6rem);
            }

            .sm\:m-auto {
                margin: auto;
            }

            .sm\:mt-0 {
                margin-top: 0;
            }

            .sm\:mt-1 {
                margin-top: calc(var(--space-multiplier) * 1rem);
            }

            .sm\:mt-2 {
                margin-top: calc(var(--space-multiplier) * 2rem);
            }

            .sm\:mt-3 {
                margin-top: calc(var(--space-multiplier) * 3rem);
            }

            .sm\:mt-4 {
                margin-top: calc(var(--space-multiplier) * 4rem);
            }

            .sm\:mt-5 {
                margin-top: calc(var(--space-multiplier) * 5rem);
            }

            .sm\:mt-6 {
                margin-top: calc(var(--space-multiplier) * 6rem);
            }

            .sm\:mt-auto {
                margin-top: auto;
            }

            .sm\:mb-0 {
                margin-bottom: 0;
            }

            .sm\:mb-1 {
                margin-bottom: calc(var(--space-multiplier) * 1rem);
            }

            .sm\:mb-2 {
                margin-bottom: calc(var(--space-multiplier) * 2rem);
            }

            .sm\:mb-3 {
                margin-bottom: calc(var(--space-multiplier) * 3rem);
            }

            .sm\:mb-4 {
                margin-bottom: calc(var(--space-multiplier) * 4rem);
            }

            .sm\:mb-5 {
                margin-bottom: calc(var(--space-multiplier) * 5rem);
            }

            .sm\:mb-6 {
                margin-bottom: calc(var(--space-multiplier) * 6rem);
            }

            .sm\:mb-auto {
                margin-bottom: auto;
            }

            .sm\:ml-0 {
                margin-left: 0;
            }

            .sm\:ml-1 {
                margin-left: calc(var(--space-multiplier) * 1rem);
            }

            .sm\:ml-2 {
                margin-left: calc(var(--space-multiplier) * 2rem);
            }

            .sm\:ml-3 {
                margin-left: calc(var(--space-multiplier) * 3rem);
            }

            .sm\:ml-4 {
                margin-left: calc(var(--space-multiplier) * 4rem);
            }

            .sm\:ml-5 {
                margin-left: calc(var(--space-multiplier) * 5rem);
            }

            .sm\:ml-6 {
                margin-left: calc(var(--space-multiplier) * 6rem);
            }

            .sm\:ml-auto {
                margin-left: auto;
            }

            .sm\:mr-0 {
                margin-right: 0;
            }

            .sm\:mr-1 {
                margin-right: calc(var(--space-multiplier) * 1rem);
            }

            .sm\:mr-2 {
                margin-right: calc(var(--space-multiplier) * 2rem);
            }

            .sm\:mr-3 {
                margin-right: calc(var(--space-multiplier) * 3rem);
            }

            .sm\:mr-4 {
                margin-right: calc(var(--space-multiplier) * 4rem);
            }

            .sm\:mr-5 {
                margin-right: calc(var(--space-multiplier) * 5rem);
            }

            .sm\:mr-6 {
                margin-right: calc(var(--space-multiplier) * 6rem);
            }

            .sm\:mr-auto {
                margin-right: auto;
            }

            .sm\:mx-0 {
                margin-left: 0;
                margin-right: 0;
            }

            .sm\:mx-1 {
                margin-left: calc(var(--space-multiplier) * 1rem);
                margin-right: calc(var(--space-multiplier) * 1rem);
            }

            .sm\:mx-2 {
                margin-left: calc(var(--space-multiplier) * 2rem);
                margin-right: calc(var(--space-multiplier) * 2rem);
            }

            .sm\:mx-3 {
                margin-left: calc(var(--space-multiplier) * 3rem);
                margin-right: calc(var(--space-multiplier) * 3rem);
            }

            .sm\:mx-4 {
                margin-left: calc(var(--space-multiplier) * 4rem);
                margin-right: calc(var(--space-multiplier) * 4rem);
            }

            .sm\:mx-5 {
                margin-left: calc(var(--space-multiplier) * 5rem);
                margin-right: calc(var(--space-multiplier) * 5rem);
            }

            .sm\:mx-6 {
                margin-left: calc(var(--space-multiplier) * 6rem);
                margin-right: calc(var(--space-multiplier) * 6rem);
            }

            .sm\:mx-auto {
                margin-left: auto;
                margin-right: auto;
            }

            .sm\:my-0 {
                margin-top: 0;
                margin-bottom: 0;
            }

            .sm\:my-1 {
                margin-top: calc(var(--space-multiplier) * 1rem);
                margin-bottom: calc(var(--space-multiplier) * 1rem);
            }

            .sm\:my-2 {
                margin-top: calc(var(--space-multiplier) * 2rem);
                margin-bottom: calc(var(--space-multiplier) * 2rem);
            }

            .sm\:my-3 {
                margin-top: calc(var(--space-multiplier) * 3rem);
                margin-bottom: calc(var(--space-multiplier) * 3rem);
            }

            .sm\:my-4 {
                margin-top: calc(var(--space-multiplier) * 4rem);
                margin-bottom: calc(var(--space-multiplier) * 4rem);
            }

            .sm\:my-5 {
                margin-top: calc(var(--space-multiplier) * 5rem);
                margin-bottom: calc(var(--space-multiplier) * 5rem);
            }

            .sm\:my-6 {
                margin-top: calc(var(--space-multiplier) * 6rem);
                margin-bottom: calc(var(--space-multiplier) * 6rem);
            }

            .sm\:my-auto {
                margin-top: auto;
                margin-bottom: auto;
            }
        }

        @media only screen and (min-width: 940px) {
            .md\:m-0 {
                margin: 0;
            }

            .md\:m-1 {
                margin: calc(var(--space-multiplier) * 1rem);
            }

            .md\:m-2 {
                margin: calc(var(--space-multiplier) * 2rem);
            }

            .md\:m-3 {
                margin: calc(var(--space-multiplier) * 3rem);
            }

            .md\:m-4 {
                margin: calc(var(--space-multiplier) * 4rem);
            }

            .md\:m-5 {
                margin: calc(var(--space-multiplier) * 5rem);
            }

            .md\:m-6 {
                margin: calc(var(--space-multiplier) * 6rem);
            }

            .md\:m-auto {
                margin: auto;
            }

            .md\:mt-0 {
                margin-top: 0;
            }

            .md\:mt-1 {
                margin-top: calc(var(--space-multiplier) * 1rem);
            }

            .md\:mt-2 {
                margin-top: calc(var(--space-multiplier) * 2rem);
            }

            .md\:mt-3 {
                margin-top: calc(var(--space-multiplier) * 3rem);
            }

            .md\:mt-4 {
                margin-top: calc(var(--space-multiplier) * 4rem);
            }

            .md\:mt-5 {
                margin-top: calc(var(--space-multiplier) * 5rem);
            }

            .md\:mt-6 {
                margin-top: calc(var(--space-multiplier) * 6rem);
            }

            .md\:mt-auto {
                margin-top: auto;
            }

            .md\:mb-0 {
                margin-bottom: 0;
            }

            .md\:mb-1 {
                margin-bottom: calc(var(--space-multiplier) * 1rem);
            }

            .md\:mb-2 {
                margin-bottom: calc(var(--space-multiplier) * 2rem);
            }

            .md\:mb-3 {
                margin-bottom: calc(var(--space-multiplier) * 3rem);
            }

            .md\:mb-4 {
                margin-bottom: calc(var(--space-multiplier) * 4rem);
            }

            .md\:mb-5 {
                margin-bottom: calc(var(--space-multiplier) * 5rem);
            }

            .md\:mb-6 {
                margin-bottom: calc(var(--space-multiplier) * 6rem);
            }

            .md\:mb-auto {
                margin-bottom: auto;
            }

            .md\:ml-0 {
                margin-left: 0;
            }

            .md\:ml-1 {
                margin-left: calc(var(--space-multiplier) * 1rem);
            }

            .md\:ml-2 {
                margin-left: calc(var(--space-multiplier) * 2rem);
            }

            .md\:ml-3 {
                margin-left: calc(var(--space-multiplier) * 3rem);
            }

            .md\:ml-4 {
                margin-left: calc(var(--space-multiplier) * 4rem);
            }

            .md\:ml-5 {
                margin-left: calc(var(--space-multiplier) * 5rem);
            }

            .md\:ml-6 {
                margin-left: calc(var(--space-multiplier) * 6rem);
            }

            .md\:ml-auto {
                margin-left: auto;
            }

            .md\:mr-0 {
                margin-right: 0;
            }

            .md\:mr-1 {
                margin-right: calc(var(--space-multiplier) * 1rem);
            }

            .md\:mr-2 {
                margin-right: calc(var(--space-multiplier) * 2rem);
            }

            .md\:mr-3 {
                margin-right: calc(var(--space-multiplier) * 3rem);
            }

            .md\:mr-4 {
                margin-right: calc(var(--space-multiplier) * 4rem);
            }

            .md\:mr-5 {
                margin-right: calc(var(--space-multiplier) * 5rem);
            }

            .md\:mr-6 {
                margin-right: calc(var(--space-multiplier) * 6rem);
            }

            .md\:mr-auto {
                margin-right: auto;
            }

            .md\:mx-0 {
                margin-left: 0;
                margin-right: 0;
            }

            .md\:mx-1 {
                margin-left: calc(var(--space-multiplier) * 1rem);
                margin-right: calc(var(--space-multiplier) * 1rem);
            }

            .md\:mx-2 {
                margin-left: calc(var(--space-multiplier) * 2rem);
                margin-right: calc(var(--space-multiplier) * 2rem);
            }

            .md\:mx-3 {
                margin-left: calc(var(--space-multiplier) * 3rem);
                margin-right: calc(var(--space-multiplier) * 3rem);
            }

            .md\:mx-4 {
                margin-left: calc(var(--space-multiplier) * 4rem);
                margin-right: calc(var(--space-multiplier) * 4rem);
            }

            .md\:mx-5 {
                margin-left: calc(var(--space-multiplier) * 5rem);
                margin-right: calc(var(--space-multiplier) * 5rem);
            }

            .md\:mx-6 {
                margin-left: calc(var(--space-multiplier) * 6rem);
                margin-right: calc(var(--space-multiplier) * 6rem);
            }

            .md\:mx-auto {
                margin-left: auto;
                margin-right: auto;
            }

            .md\:my-0 {
                margin-top: 0;
                margin-bottom: 0;
            }

            .md\:my-1 {
                margin-top: calc(var(--space-multiplier) * 1rem);
                margin-bottom: calc(var(--space-multiplier) * 1rem);
            }

            .md\:my-2 {
                margin-top: calc(var(--space-multiplier) * 2rem);
                margin-bottom: calc(var(--space-multiplier) * 2rem);
            }

            .md\:my-3 {
                margin-top: calc(var(--space-multiplier) * 3rem);
                margin-bottom: calc(var(--space-multiplier) * 3rem);
            }

            .md\:my-4 {
                margin-top: calc(var(--space-multiplier) * 4rem);
                margin-bottom: calc(var(--space-multiplier) * 4rem);
            }

            .md\:my-5 {
                margin-top: calc(var(--space-multiplier) * 5rem);
                margin-bottom: calc(var(--space-multiplier) * 5rem);
            }

            .md\:my-6 {
                margin-top: calc(var(--space-multiplier) * 6rem);
                margin-bottom: calc(var(--space-multiplier) * 6rem);
            }

            .md\:my-auto {
                margin-top: auto;
                margin-bottom: auto;
            }
        }

        @media only screen and (min-width: 1240px) {
            .lg\:m-0 {
                margin: 0;
            }

            .lg\:m-1 {
                margin: calc(var(--space-multiplier) * 1rem);
            }

            .lg\:m-2 {
                margin: calc(var(--space-multiplier) * 2rem);
            }

            .lg\:m-3 {
                margin: calc(var(--space-multiplier) * 3rem);
            }

            .lg\:m-4 {
                margin: calc(var(--space-multiplier) * 4rem);
            }

            .lg\:m-5 {
                margin: calc(var(--space-multiplier) * 5rem);
            }

            .lg\:m-6 {
                margin: calc(var(--space-multiplier) * 6rem);
            }

            .lg\:m-auto {
                margin: auto;
            }

            .lg\:mt-0 {
                margin-top: 0;
            }

            .lg\:mt-1 {
                margin-top: calc(var(--space-multiplier) * 1rem);
            }

            .lg\:mt-2 {
                margin-top: calc(var(--space-multiplier) * 2rem);
            }

            .lg\:mt-3 {
                margin-top: calc(var(--space-multiplier) * 3rem);
            }

            .lg\:mt-4 {
                margin-top: calc(var(--space-multiplier) * 4rem);
            }

            .lg\:mt-5 {
                margin-top: calc(var(--space-multiplier) * 5rem);
            }

            .lg\:mt-6 {
                margin-top: calc(var(--space-multiplier) * 6rem);
            }

            .lg\:mt-auto {
                margin-top: auto;
            }

            .lg\:mb-0 {
                margin-bottom: 0;
            }

            .lg\:mb-1 {
                margin-bottom: calc(var(--space-multiplier) * 1rem);
            }

            .lg\:mb-2 {
                margin-bottom: calc(var(--space-multiplier) * 2rem);
            }

            .lg\:mb-3 {
                margin-bottom: calc(var(--space-multiplier) * 3rem);
            }

            .lg\:mb-4 {
                margin-bottom: calc(var(--space-multiplier) * 4rem);
            }

            .lg\:mb-5 {
                margin-bottom: calc(var(--space-multiplier) * 5rem);
            }

            .lg\:mb-6 {
                margin-bottom: calc(var(--space-multiplier) * 6rem);
            }

            .lg\:mb-auto {
                margin-bottom: auto;
            }

            .lg\:ml-0 {
                margin-left: 0;
            }

            .lg\:ml-1 {
                margin-left: calc(var(--space-multiplier) * 1rem);
            }

            .lg\:ml-2 {
                margin-left: calc(var(--space-multiplier) * 2rem);
            }

            .lg\:ml-3 {
                margin-left: calc(var(--space-multiplier) * 3rem);
            }

            .lg\:ml-4 {
                margin-left: calc(var(--space-multiplier) * 4rem);
            }

            .lg\:ml-5 {
                margin-left: calc(var(--space-multiplier) * 5rem);
            }

            .lg\:ml-6 {
                margin-left: calc(var(--space-multiplier) * 6rem);
            }

            .lg\:ml-auto {
                margin-left: auto;
            }

            .lg\:mr-0 {
                margin-right: 0;
            }

            .lg\:mr-1 {
                margin-right: calc(var(--space-multiplier) * 1rem);
            }

            .lg\:mr-2 {
                margin-right: calc(var(--space-multiplier) * 2rem);
            }

            .lg\:mr-3 {
                margin-right: calc(var(--space-multiplier) * 3rem);
            }

            .lg\:mr-4 {
                margin-right: calc(var(--space-multiplier) * 4rem);
            }

            .lg\:mr-5 {
                margin-right: calc(var(--space-multiplier) * 5rem);
            }

            .lg\:mr-6 {
                margin-right: calc(var(--space-multiplier) * 6rem);
            }

            .lg\:mr-auto {
                margin-right: auto;
            }

            .lg\:mx-0 {
                margin-left: 0;
                margin-right: 0;
            }

            .lg\:mx-1 {
                margin-left: calc(var(--space-multiplier) * 1rem);
                margin-right: calc(var(--space-multiplier) * 1rem);
            }

            .lg\:mx-2 {
                margin-left: calc(var(--space-multiplier) * 2rem);
                margin-right: calc(var(--space-multiplier) * 2rem);
            }

            .lg\:mx-3 {
                margin-left: calc(var(--space-multiplier) * 3rem);
                margin-right: calc(var(--space-multiplier) * 3rem);
            }

            .lg\:mx-4 {
                margin-left: calc(var(--space-multiplier) * 4rem);
                margin-right: calc(var(--space-multiplier) * 4rem);
            }

            .lg\:mx-5 {
                margin-left: calc(var(--space-multiplier) * 5rem);
                margin-right: calc(var(--space-multiplier) * 5rem);
            }

            .lg\:mx-6 {
                margin-left: calc(var(--space-multiplier) * 6rem);
                margin-right: calc(var(--space-multiplier) * 6rem);
            }

            .lg\:mx-auto {
                margin-left: auto;
                margin-right: auto;
            }

            .lg\:my-0 {
                margin-top: 0;
                margin-bottom: 0;
            }

            .lg\:my-1 {
                margin-top: calc(var(--space-multiplier) * 1rem);
                margin-bottom: calc(var(--space-multiplier) * 1rem);
            }

            .lg\:my-2 {
                margin-top: calc(var(--space-multiplier) * 2rem);
                margin-bottom: calc(var(--space-multiplier) * 2rem);
            }

            .lg\:my-3 {
                margin-top: calc(var(--space-multiplier) * 3rem);
                margin-bottom: calc(var(--space-multiplier) * 3rem);
            }

            .lg\:my-4 {
                margin-top: calc(var(--space-multiplier) * 4rem);
                margin-bottom: calc(var(--space-multiplier) * 4rem);
            }

            .lg\:my-5 {
                margin-top: calc(var(--space-multiplier) * 5rem);
                margin-bottom: calc(var(--space-multiplier) * 5rem);
            }

            .lg\:my-6 {
                margin-top: calc(var(--space-multiplier) * 6rem);
                margin-bottom: calc(var(--space-multiplier) * 6rem);
            }

            .lg\:my-auto {
                margin-top: auto;
                margin-bottom: auto;
            }
        }

        .p-0 {
            padding: 0;
        }

        .p-1 {
            padding: calc(var(--space-multiplier) * 1rem);
        }

        .p-2 {
            padding: calc(var(--space-multiplier) * 2rem);
        }

        .p-3 {
            padding: calc(var(--space-multiplier) * 3rem);
        }

        .p-4 {
            padding: calc(var(--space-multiplier) * 4rem);
        }

        .p-5 {
            padding: calc(var(--space-multiplier) * 5rem);
        }

        .p-6 {
            padding: calc(var(--space-multiplier) * 6rem);
        }

        .pt-0 {
            padding-top: 0;
        }

        .pt-1 {
            padding-top: calc(var(--space-multiplier) * 1rem);
        }

        .pt-2 {
            padding-top: calc(var(--space-multiplier) * 2rem);
        }

        .pt-3 {
            padding-top: calc(var(--space-multiplier) * 3rem);
        }

        .pt-4 {
            padding-top: calc(var(--space-multiplier) * 4rem);
        }

        .pt-5 {
            padding-top: calc(var(--space-multiplier) * 5rem);
        }

        .pt-6 {
            padding-top: calc(var(--space-multiplier) * 6rem);
        }

        .pb-0 {
            padding-bottom: 0;
        }

        .pb-1 {
            padding-bottom: calc(var(--space-multiplier) * 1rem);
        }

        .pb-2 {
            padding-bottom: calc(var(--space-multiplier) * 2rem);
        }

        .pb-3 {
            padding-bottom: calc(var(--space-multiplier) * 3rem);
        }

        .pb-4 {
            padding-bottom: calc(var(--space-multiplier) * 4rem);
        }

        .pb-5 {
            padding-bottom: calc(var(--space-multiplier) * 5rem);
        }

        .pb-6 {
            padding-bottom: calc(var(--space-multiplier) * 6rem);
        }

        .pl-0 {
            padding-left: 0;
        }

        .pl-1 {
            padding-left: calc(var(--space-multiplier) * 1rem);
        }

        .pl-2 {
            padding-left: calc(var(--space-multiplier) * 2rem);
        }

        .pl-3 {
            padding-left: calc(var(--space-multiplier) * 3rem);
        }

        .pl-4 {
            padding-left: calc(var(--space-multiplier) * 4rem);
        }

        .pl-5 {
            padding-left: calc(var(--space-multiplier) * 5rem);
        }

        .pl-6 {
            padding-left: calc(var(--space-multiplier) * 6rem);
        }

        .pr-0 {
            padding-right: 0;
        }

        .pr-1 {
            padding-right: calc(var(--space-multiplier) * 1rem);
        }

        .pr-2 {
            padding-right: calc(var(--space-multiplier) * 2rem);
        }

        .pr-3 {
            padding-right: calc(var(--space-multiplier) * 3rem);
        }

        .pr-4 {
            padding-right: calc(var(--space-multiplier) * 4rem);
        }

        .pr-5 {
            padding-right: calc(var(--space-multiplier) * 5rem);
        }

        .pr-6 {
            padding-right: calc(var(--space-multiplier) * 6rem);
        }

        .px-0 {
            padding-left: 0;
            padding-right: 0;
        }

        .px-1 {
            padding-left: calc(var(--space-multiplier) * 1rem);
            padding-right: calc(var(--space-multiplier) * 1rem);
        }

        .px-2 {
            padding-left: calc(var(--space-multiplier) * 2rem);
            padding-right: calc(var(--space-multiplier) * 2rem);
        }

        .px-3 {
            padding-left: calc(var(--space-multiplier) * 3rem);
            padding-right: calc(var(--space-multiplier) * 3rem);
        }

        .px-4 {
            padding-left: calc(var(--space-multiplier) * 4rem);
            padding-right: calc(var(--space-multiplier) * 4rem);
        }

        .px-5 {
            padding-left: calc(var(--space-multiplier) * 5rem);
            padding-right: calc(var(--space-multiplier) * 5rem);
        }

        .px-6 {
            padding-left: calc(var(--space-multiplier) * 6rem);
            padding-right: calc(var(--space-multiplier) * 6rem);
        }

        .py-0 {
            padding-top: 0;
            padding-bottom: 0;
        }

        .py-1 {
            padding-top: calc(var(--space-multiplier) * 1rem);
            padding-bottom: calc(var(--space-multiplier) * 1rem);
        }

        .py-2 {
            padding-top: calc(var(--space-multiplier) * 2rem);
            padding-bottom: calc(var(--space-multiplier) * 2rem);
        }

        .py-3 {
            padding-top: calc(var(--space-multiplier) * 3rem);
            padding-bottom: calc(var(--space-multiplier) * 3rem);
        }

        .py-4 {
            padding-top: calc(var(--space-multiplier) * 4rem);
            padding-bottom: calc(var(--space-multiplier) * 4rem);
        }

        .py-5 {
            padding-top: calc(var(--space-multiplier) * 5rem);
            padding-bottom: calc(var(--space-multiplier) * 5rem);
        }

        .py-6 {
            padding-top: calc(var(--space-multiplier) * 6rem);
            padding-bottom: calc(var(--space-multiplier) * 6rem);
        }

        @media only screen and (min-width: 640px) {
            .sm\:p-0 {
                padding: 0;
            }

            .sm\:p-1 {
                padding: calc(var(--space-multiplier) * 1rem);
            }

            .sm\:p-2 {
                padding: calc(var(--space-multiplier) * 2rem);
            }

            .sm\:p-3 {
                padding: calc(var(--space-multiplier) * 3rem);
            }

            .sm\:p-4 {
                padding: calc(var(--space-multiplier) * 4rem);
            }

            .sm\:p-5 {
                padding: calc(var(--space-multiplier) * 5rem);
            }

            .sm\:p-6 {
                padding: calc(var(--space-multiplier) * 6rem);
            }

            .sm\:pt-0 {
                padding-top: 0;
            }

            .sm\:pt-1 {
                padding-top: calc(var(--space-multiplier) * 1rem);
            }

            .sm\:pt-2 {
                padding-top: calc(var(--space-multiplier) * 2rem);
            }

            .sm\:pt-3 {
                padding-top: calc(var(--space-multiplier) * 3rem);
            }

            .sm\:pt-4 {
                padding-top: calc(var(--space-multiplier) * 4rem);
            }

            .sm\:pt-5 {
                padding-top: calc(var(--space-multiplier) * 5rem);
            }

            .sm\:pt-6 {
                padding-top: calc(var(--space-multiplier) * 6rem);
            }

            .sm\:pb-0 {
                padding-bottom: 0;
            }

            .sm\:pb-1 {
                padding-bottom: calc(var(--space-multiplier) * 1rem);
            }

            .sm\:pb-2 {
                padding-bottom: calc(var(--space-multiplier) * 2rem);
            }

            .sm\:pb-3 {
                padding-bottom: calc(var(--space-multiplier) * 3rem);
            }

            .sm\:pb-4 {
                padding-bottom: calc(var(--space-multiplier) * 4rem);
            }

            .sm\:pb-5 {
                padding-bottom: calc(var(--space-multiplier) * 5rem);
            }

            .sm\:pb-6 {
                padding-bottom: calc(var(--space-multiplier) * 6rem);
            }

            .sm\:pl-0 {
                padding-left: 0;
            }

            .sm\:pl-1 {
                padding-left: calc(var(--space-multiplier) * 1rem);
            }

            .sm\:pl-2 {
                padding-left: calc(var(--space-multiplier) * 2rem);
            }

            .sm\:pl-3 {
                padding-left: calc(var(--space-multiplier) * 3rem);
            }

            .sm\:pl-4 {
                padding-left: calc(var(--space-multiplier) * 4rem);
            }

            .sm\:pl-5 {
                padding-left: calc(var(--space-multiplier) * 5rem);
            }

            .sm\:pl-6 {
                padding-left: calc(var(--space-multiplier) * 6rem);
            }

            .sm\:pr-0 {
                padding-right: 0;
            }

            .sm\:pr-1 {
                padding-right: calc(var(--space-multiplier) * 1rem);
            }

            .sm\:pr-2 {
                padding-right: calc(var(--space-multiplier) * 2rem);
            }

            .sm\:pr-3 {
                padding-right: calc(var(--space-multiplier) * 3rem);
            }

            .sm\:pr-4 {
                padding-right: calc(var(--space-multiplier) * 4rem);
            }

            .sm\:pr-5 {
                padding-right: calc(var(--space-multiplier) * 5rem);
            }

            .sm\:pr-6 {
                padding-right: calc(var(--space-multiplier) * 6rem);
            }

            .sm\:px-0 {
                padding-left: 0;
                padding-right: 0;
            }

            .sm\:px-1 {
                padding-left: calc(var(--space-multiplier) * 1rem);
                padding-right: calc(var(--space-multiplier) * 1rem);
            }

            .sm\:px-2 {
                padding-left: calc(var(--space-multiplier) * 2rem);
                padding-right: calc(var(--space-multiplier) * 2rem);
            }

            .sm\:px-3 {
                padding-left: calc(var(--space-multiplier) * 3rem);
                padding-right: calc(var(--space-multiplier) * 3rem);
            }

            .sm\:px-4 {
                padding-left: calc(var(--space-multiplier) * 4rem);
                padding-right: calc(var(--space-multiplier) * 4rem);
            }

            .sm\:px-5 {
                padding-left: calc(var(--space-multiplier) * 5rem);
                padding-right: calc(var(--space-multiplier) * 5rem);
            }

            .sm\:px-6 {
                padding-left: calc(var(--space-multiplier) * 6rem);
                padding-right: calc(var(--space-multiplier) * 6rem);
            }

            .sm\:py-0 {
                padding-top: 0;
                padding-bottom: 0;
            }

            .sm\:py-1 {
                padding-top: calc(var(--space-multiplier) * 1rem);
                padding-bottom: calc(var(--space-multiplier) * 1rem);
            }

            .sm\:py-2 {
                padding-top: calc(var(--space-multiplier) * 2rem);
                padding-bottom: calc(var(--space-multiplier) * 2rem);
            }

            .sm\:py-3 {
                padding-top: calc(var(--space-multiplier) * 3rem);
                padding-bottom: calc(var(--space-multiplier) * 3rem);
            }

            .sm\:py-4 {
                padding-top: calc(var(--space-multiplier) * 4rem);
                padding-bottom: calc(var(--space-multiplier) * 4rem);
            }

            .sm\:py-5 {
                padding-top: calc(var(--space-multiplier) * 5rem);
                padding-bottom: calc(var(--space-multiplier) * 5rem);
            }

            .sm\:py-6 {
                padding-top: calc(var(--space-multiplier) * 6rem);
                padding-bottom: calc(var(--space-multiplier) * 6rem);
            }
        }

        @media only screen and (min-width: 940px) {
            .md\:p-0 {
                padding: 0;
            }

            .md\:p-1 {
                padding: calc(var(--space-multiplier) * 1rem);
            }

            .md\:p-2 {
                padding: calc(var(--space-multiplier) * 2rem);
            }

            .md\:p-3 {
                padding: calc(var(--space-multiplier) * 3rem);
            }

            .md\:p-4 {
                padding: calc(var(--space-multiplier) * 4rem);
            }

            .md\:p-5 {
                padding: calc(var(--space-multiplier) * 5rem);
            }

            .md\:p-6 {
                padding: calc(var(--space-multiplier) * 6rem);
            }

            .md\:pt-0 {
                padding-top: 0;
            }

            .md\:pt-1 {
                padding-top: calc(var(--space-multiplier) * 1rem);
            }

            .md\:pt-2 {
                padding-top: calc(var(--space-multiplier) * 2rem);
            }

            .md\:pt-3 {
                padding-top: calc(var(--space-multiplier) * 3rem);
            }

            .md\:pt-4 {
                padding-top: calc(var(--space-multiplier) * 4rem);
            }

            .md\:pt-5 {
                padding-top: calc(var(--space-multiplier) * 5rem);
            }

            .md\:pt-6 {
                padding-top: calc(var(--space-multiplier) * 6rem);
            }

            .md\:pb-0 {
                padding-bottom: 0;
            }

            .md\:pb-1 {
                padding-bottom: calc(var(--space-multiplier) * 1rem);
            }

            .md\:pb-2 {
                padding-bottom: calc(var(--space-multiplier) * 2rem);
            }

            .md\:pb-3 {
                padding-bottom: calc(var(--space-multiplier) * 3rem);
            }

            .md\:pb-4 {
                padding-bottom: calc(var(--space-multiplier) * 4rem);
            }

            .md\:pb-5 {
                padding-bottom: calc(var(--space-multiplier) * 5rem);
            }

            .md\:pb-6 {
                padding-bottom: calc(var(--space-multiplier) * 6rem);
            }

            .md\:pl-0 {
                padding-left: 0;
            }

            .md\:pl-1 {
                padding-left: calc(var(--space-multiplier) * 1rem);
            }

            .md\:pl-2 {
                padding-left: calc(var(--space-multiplier) * 2rem);
            }

            .md\:pl-3 {
                padding-left: calc(var(--space-multiplier) * 3rem);
            }

            .md\:pl-4 {
                padding-left: calc(var(--space-multiplier) * 4rem);
            }

            .md\:pl-5 {
                padding-left: calc(var(--space-multiplier) * 5rem);
            }

            .md\:pl-6 {
                padding-left: calc(var(--space-multiplier) * 6rem);
            }

            .md\:pr-0 {
                padding-right: 0;
            }

            .md\:pr-1 {
                padding-right: calc(var(--space-multiplier) * 1rem);
            }

            .md\:pr-2 {
                padding-right: calc(var(--space-multiplier) * 2rem);
            }

            .md\:pr-3 {
                padding-right: calc(var(--space-multiplier) * 3rem);
            }

            .md\:pr-4 {
                padding-right: calc(var(--space-multiplier) * 4rem);
            }

            .md\:pr-5 {
                padding-right: calc(var(--space-multiplier) * 5rem);
            }

            .md\:pr-6 {
                padding-right: calc(var(--space-multiplier) * 6rem);
            }

            .md\:px-0 {
                padding-left: 0;
                padding-right: 0;
            }

            .md\:px-1 {
                padding-left: calc(var(--space-multiplier) * 1rem);
                padding-right: calc(var(--space-multiplier) * 1rem);
            }

            .md\:px-2 {
                padding-left: calc(var(--space-multiplier) * 2rem);
                padding-right: calc(var(--space-multiplier) * 2rem);
            }

            .md\:px-3 {
                padding-left: calc(var(--space-multiplier) * 3rem);
                padding-right: calc(var(--space-multiplier) * 3rem);
            }

            .md\:px-4 {
                padding-left: calc(var(--space-multiplier) * 4rem);
                padding-right: calc(var(--space-multiplier) * 4rem);
            }

            .md\:px-5 {
                padding-left: calc(var(--space-multiplier) * 5rem);
                padding-right: calc(var(--space-multiplier) * 5rem);
            }

            .md\:px-6 {
                padding-left: calc(var(--space-multiplier) * 6rem);
                padding-right: calc(var(--space-multiplier) * 6rem);
            }

            .md\:py-0 {
                padding-top: 0;
                padding-bottom: 0;
            }

            .md\:py-1 {
                padding-top: calc(var(--space-multiplier) * 1rem);
                padding-bottom: calc(var(--space-multiplier) * 1rem);
            }

            .md\:py-2 {
                padding-top: calc(var(--space-multiplier) * 2rem);
                padding-bottom: calc(var(--space-multiplier) * 2rem);
            }

            .md\:py-3 {
                padding-top: calc(var(--space-multiplier) * 3rem);
                padding-bottom: calc(var(--space-multiplier) * 3rem);
            }

            .md\:py-4 {
                padding-top: calc(var(--space-multiplier) * 4rem);
                padding-bottom: calc(var(--space-multiplier) * 4rem);
            }

            .md\:py-5 {
                padding-top: calc(var(--space-multiplier) * 5rem);
                padding-bottom: calc(var(--space-multiplier) * 5rem);
            }

            .md\:py-6 {
                padding-top: calc(var(--space-multiplier) * 6rem);
                padding-bottom: calc(var(--space-multiplier) * 6rem);
            }
        }

        @media only screen and (min-width: 1240px) {
            .lg\:p-0 {
                padding: 0;
            }

            .lg\:p-1 {
                padding: calc(var(--space-multiplier) * 1rem);
            }

            .lg\:p-2 {
                padding: calc(var(--space-multiplier) * 2rem);
            }

            .lg\:p-3 {
                padding: calc(var(--space-multiplier) * 3rem);
            }

            .lg\:p-4 {
                padding: calc(var(--space-multiplier) * 4rem);
            }

            .lg\:p-5 {
                padding: calc(var(--space-multiplier) * 5rem);
            }

            .lg\:p-6 {
                padding: calc(var(--space-multiplier) * 6rem);
            }

            .lg\:pt-0 {
                padding-top: 0;
            }

            .lg\:pt-1 {
                padding-top: calc(var(--space-multiplier) * 1rem);
            }

            .lg\:pt-2 {
                padding-top: calc(var(--space-multiplier) * 2rem);
            }

            .lg\:pt-3 {
                padding-top: calc(var(--space-multiplier) * 3rem);
            }

            .lg\:pt-4 {
                padding-top: calc(var(--space-multiplier) * 4rem);
            }

            .lg\:pt-5 {
                padding-top: calc(var(--space-multiplier) * 5rem);
            }

            .lg\:pt-6 {
                padding-top: calc(var(--space-multiplier) * 6rem);
            }

            .lg\:pb-0 {
                padding-bottom: 0;
            }

            .lg\:pb-1 {
                padding-bottom: calc(var(--space-multiplier) * 1rem);
            }

            .lg\:pb-2 {
                padding-bottom: calc(var(--space-multiplier) * 2rem);
            }

            .lg\:pb-3 {
                padding-bottom: calc(var(--space-multiplier) * 3rem);
            }

            .lg\:pb-4 {
                padding-bottom: calc(var(--space-multiplier) * 4rem);
            }

            .lg\:pb-5 {
                padding-bottom: calc(var(--space-multiplier) * 5rem);
            }

            .lg\:pb-6 {
                padding-bottom: calc(var(--space-multiplier) * 6rem);
            }

            .lg\:pl-0 {
                padding-left: 0;
            }

            .lg\:pl-1 {
                padding-left: calc(var(--space-multiplier) * 1rem);
            }

            .lg\:pl-2 {
                padding-left: calc(var(--space-multiplier) * 2rem);
            }

            .lg\:pl-3 {
                padding-left: calc(var(--space-multiplier) * 3rem);
            }

            .lg\:pl-4 {
                padding-left: calc(var(--space-multiplier) * 4rem);
            }

            .lg\:pl-5 {
                padding-left: calc(var(--space-multiplier) * 5rem);
            }

            .lg\:pl-6 {
                padding-left: calc(var(--space-multiplier) * 6rem);
            }

            .lg\:pr-0 {
                padding-right: 0;
            }

            .lg\:pr-1 {
                padding-right: calc(var(--space-multiplier) * 1rem);
            }

            .lg\:pr-2 {
                padding-right: calc(var(--space-multiplier) * 2rem);
            }

            .lg\:pr-3 {
                padding-right: calc(var(--space-multiplier) * 3rem);
            }

            .lg\:pr-4 {
                padding-right: calc(var(--space-multiplier) * 4rem);
            }

            .lg\:pr-5 {
                padding-right: calc(var(--space-multiplier) * 5rem);
            }

            .lg\:pr-6 {
                padding-right: calc(var(--space-multiplier) * 6rem);
            }

            .lg\:px-0 {
                padding-left: 0;
                padding-right: 0;
            }

            .lg\:px-1 {
                padding-left: calc(var(--space-multiplier) * 1rem);
                padding-right: calc(var(--space-multiplier) * 1rem);
            }

            .lg\:px-2 {
                padding-left: calc(var(--space-multiplier) * 2rem);
                padding-right: calc(var(--space-multiplier) * 2rem);
            }

            .lg\:px-3 {
                padding-left: calc(var(--space-multiplier) * 3rem);
                padding-right: calc(var(--space-multiplier) * 3rem);
            }

            .lg\:px-4 {
                padding-left: calc(var(--space-multiplier) * 4rem);
                padding-right: calc(var(--space-multiplier) * 4rem);
            }

            .lg\:px-5 {
                padding-left: calc(var(--space-multiplier) * 5rem);
                padding-right: calc(var(--space-multiplier) * 5rem);
            }

            .lg\:px-6 {
                padding-left: calc(var(--space-multiplier) * 6rem);
                padding-right: calc(var(--space-multiplier) * 6rem);
            }

            .lg\:py-0 {
                padding-top: 0;
                padding-bottom: 0;
            }

            .lg\:py-1 {
                padding-top: calc(var(--space-multiplier) * 1rem);
                padding-bottom: calc(var(--space-multiplier) * 1rem);
            }

            .lg\:py-2 {
                padding-top: calc(var(--space-multiplier) * 2rem);
                padding-bottom: calc(var(--space-multiplier) * 2rem);
            }

            .lg\:py-3 {
                padding-top: calc(var(--space-multiplier) * 3rem);
                padding-bottom: calc(var(--space-multiplier) * 3rem);
            }

            .lg\:py-4 {
                padding-top: calc(var(--space-multiplier) * 4rem);
                padding-bottom: calc(var(--space-multiplier) * 4rem);
            }

            .lg\:py-5 {
                padding-top: calc(var(--space-multiplier) * 5rem);
                padding-bottom: calc(var(--space-multiplier) * 5rem);
            }

            .lg\:py-6 {
                padding-top: calc(var(--space-multiplier) * 6rem);
                padding-bottom: calc(var(--space-multiplier) * 6rem);
            }
        }

        /* ==========================================================================
           Component: Progress Form
           ========================================================================== */

        .progress-form {
            background-color: hsl(var(--white));
            border-radius: 4px;
            box-shadow: 0 1px 3px 0 rgb(0, 0, 0, 10%),
            0 1px 2px -1px rgb(0, 0, 0, 10%);
        }

        /* Tabs
           ========================================================================== */

        .progress-form__tabs {
            column-gap: 0;
        }

        @media only screen and (min-width: 640px) {
            .progress-form__tabs {
                column-gap: 0.2rem;
            }
        }

        .progress-form__tabs-item {
            --button-background-color: transparent;
            --button-border-width: 5px;
            --button-border-style: solid;
            --button-border-color:  hsl(var(--gray-300));
            --button-border: var(--button-border-width)
            var(--button-border-style)
            var(--button-border-color);
            --button-border-radius: 0;
            --button-height: 1.4;
            --button-text-align: left;
            --button-text-color: hsl(var(--blue-900));
            --button-text-font-size: 1.4rem;
            --button-text-letter-spacing: 0.025em;
            --button-text-shadow: none;

            background-color: var(--button-background-color);
            border: 0;
            border-top: var(--button-border);
            border-radius: var(--button-border-radius);
            color: var(--button-text-color);
            display: none;
            font-size: var(--button-text-font-size);
            letter-spacing: var(--button-text-letter-spacing);
            line-height: var(--button-height);
            position: relative;
            text-align: var(--button-text-align);
            text-shadow: var(--button-text-shadow);
            transition: color 0.2s ease-in-out;
            white-space: normal;
        }

        .progress-form__tabs-item:active {
            transform: none;
        }

        .progress-form__tabs-item:hover,
        .progress-form__tabs-item:focus {
            background-color: inherit;
            color: inherit;
        }

        .progress-form__tabs-item::before {
            background-color: hsl(var(--light-blue-500));
            content: "";
            height: 5px;
            left: 0;
            position: absolute;
            top: -5px;
            transition: width 0.2s ease-in-out;
            width: 0;
        }

        .progress-form__tabs-item > .step {
            color: hsl(var(--blue-100));
            font-size: 1.2rem;
            font-weight: 500;
            text-transform: uppercase;
            transition: color 0.2s ease-in-out;
        }

        @media only screen and (min-width: 640px) {
            .progress-form__tabs-item {
                display: block;
            }
        }

        /* --- Current Step --- */

        .progress-form__tabs-item[aria-selected="true"] {
            display: block;
        }

        .progress-form__tabs-item[aria-selected="true"]::before {
            width: 50%;
        }

        .progress-form__tabs-item[aria-selected="true"] > .step {
            color: hsl(var(--light-blue-500));
        }

        /* --- Disabled Step --- */

        @media only screen and (min-width: 640px) {
            .progress-form__tabs-item[aria-disabled="true"] {
                --button-background-color: transparent;
                --button-text-color: hsl(var(--blue-100));

                background-color: var(--button-background-color);
                color: var(--button-text-color);
            }
        }

        /* --- Completed Step --- */

        .progress-form__tabs-item[data-complete="true"]::before {
            width: 100%;
        }

        .progress-form__tabs-item[data-complete="true"] > .step {
            color: hsl(var(--light-blue-500));
        }
        input{
            line-height: 30px!important;
        }
        select{
            line-height: 30px!important;
            font-size: 16px!important;
        }
        option{
            font-size: 16px!important;
        }
        textarea{
            font-size: 16px!important;
        }

    </style>
@endsection
@section('content')
    <!-- ============================================-->
    <!-- <section> begin ============================-->

    <section class="py-0 overflow-hidden light" id="banner" style="height: 880px!important;">


        <!--/.bg-holder-->

        <div class="container" style="margin-top:-20px;">
            <div class="row flex-center pt-8 pt-lg-10 pb-lg-9 pb-xl-0">
                <section class="py-3  ">

                    <div class="container mt-5">

                        <form id="progress-form" class="p-4 progress-form"  enctype="multipart/form-data" action="{{route('front.basvurukayit')}}" method="post" lang="en" novalidate>
                            @if(session('success'))
                                <div class="row alert alert-success">{{session('success')}}</div>
                            @endif
                            <!-- Step Navigation -->
                            @csrf
                            <div class="d-flex align-items-start mb-3 sm:mb-5 progress-form__tabs" role="tablist">
                                <button id="progress-form__tab-1" class="flex-1 px-0 pt-2 progress-form__tabs-item" type="button" role="tab" aria-controls="progress-form__panel-1" aria-selected="true">
                                    <span class="d-block step" aria-hidden="true">Üyelik Bilgileri <span class="sm:d-none">of 8</span></span>

                                </button>
                                <button id="progress-form__tab-2" class="flex-1 px-0 pt-2 progress-form__tabs-item" type="button" role="tab" aria-controls="progress-form__panel-2" aria-selected="false" tabindex="-1" aria-disabled="true">
                                    <span class="d-block step" aria-hidden="true">Tercihler <span class="sm:d-none">of 8</span></span>

                                </button>
                                <button id="progress-form__tab-3" class="flex-1 px-0 pt-2 progress-form__tabs-item" type="button" role="tab" aria-controls="progress-form__panel-3" aria-selected="false" tabindex="-1" aria-disabled="true">
                                    <span class="d-block step" aria-hidden="true">İletişim Bilgileri <span class="sm:d-none">of 8</span></span>

                                </button>
                                <button id="progress-form__tab-4" class="flex-1 px-0 pt-2 progress-form__tabs-item" type="button" role="tab" aria-controls="progress-form__panel-4" aria-selected="false" tabindex="-1" aria-disabled="true">
                                    <span class="d-block step" aria-hidden="true">Genel Bilgiler <span class="sm:d-none">of 8</span></span>

                                </button>
                                <button id="progress-form__tab-5" class="flex-1 px-0 pt-2 progress-form__tabs-item" type="button" role="tab" aria-controls="progress-form__panel-5" aria-selected="false" tabindex="-1" aria-disabled="true">
                                    <span class="d-block step" aria-hidden="true">Eğitim Bilgileri <span class="sm:d-none">of 8</span></span>

                                </button>
                                <button id="progress-form__tab-6" class="flex-1 px-0 pt-2 progress-form__tabs-item" type="button" role="tab" aria-controls="progress-form__panel-6" aria-selected="false" tabindex="-1" aria-disabled="true">
                                    <span class="d-block step" aria-hidden="true">Deneyimler <span class="sm:d-none">of 8</span></span>

                                </button>
                                <button id="progress-form__tab-7" class="flex-1 px-0 pt-2 progress-form__tabs-item" type="button" role="tab" aria-controls="progress-form__panel-8" aria-selected="false" tabindex="-1" aria-disabled="true">
                                    <span class="d-block step" aria-hidden="true">Nitelikler <span class="sm:d-none">of 8</span></span>

                                </button>


                                <button id="progress-form__tab-8" class="flex-1 px-0 pt-2 progress-form__tabs-item" type="button" role="tab" aria-controls="progress-form__panel-8" aria-selected="false" tabindex="-1" aria-disabled="true">
                                    <span class="d-block step" aria-hidden="true">Referanslar <span class="sm:d-none">of 8</span></span>

                                </button>

                            </div>
                            <!-- / End Step Navigation -->

                            <!-- Step 1 -->
                            <section id="progress-form__panel-1"  style="margin-top: -50px;" role="tabpanel" aria-labelledby="progress-form__tab-1" tabindex="0">
                                <div class="">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="container form__field">
                                                @if(Request::segment(3)!='')
                                                    <input type="hidden" name="ilanno" value="{{Request::segment(3)}}">
                                                    @endif
                                                <label for="avatar">Vesikalık </label>

                                                <input type="file" accept="image/png, image/jpeg" style="line-height: 24px!important;font-size: 16px;" name="avatar" id="avatar" class="form-control" autocomplete="given-name" @guest required @endguest >
                                            </div>
                                            <div class="container mt-4 form__field">
                                                <label for="tc">Tc Kimlik Numarası</label>
                                                <input type="number" name="tc" id="tc" class="form-control" autocomplete="given-name" min="1" max="9"  @auth value="{{Auth::user()->tc}}" @endauth required>
                                            </div>
                                            <div class="container mt-4 form__field">
                                                @if(Request::segment(3)!='')
                                                <label for="brans">Branş</label>
                                                <input type="text" readonly  value="{{Request::segment(2)}}">
                                                    <input type="hidden"  name="brans_id" value="{{ \App\Http\Controllers\front\IndexController::getBransId(Request::segment(2)) }}">
                                                @else
                                                    <label for="brans">Branş</label>
                                                <select id="brans_id" name="brans_id" class="form-select" required>
                                                    <option value="">Seçiniz</option>
                                                    @foreach($brans as $b)
                                                        <option value="{{$b->id}}"  >{{$b->brans_name}}</option>
                                                    @endforeach

                                                </select>
                                                @endif

                                            </div>
                                        </div>
                                        <div class="col-lg-6">


                                            <div class="container form__field">
                                                <label for="firstname">Adınız</label>
                                                <input type="text" id="firstname" name="firstname" class="form-control" @auth value="{{Auth::user()->firstname}}" @endauth required>
                                            </div>
                                            <div class="container mt-4 form__field">
                                                <label for="lastname">Soyadınız</label>
                                                <input type="text" id="lastname" name="lastname" class="form-control" @auth value="{{Auth::user()->lastname}}" @endauth required>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center justify-center sm:justify-end mt-4 sm:mt-5">
                                    <button type="button" data-action="next">
                                        İleri
                                    </button>
                                </div>
                            </section>
                            <!-- / End Step 1 -->

                            <!-- Step 2 -->
                            <section id="progress-form__panel-2" role="tabpanel" style="margin-top: -50px;" aria-labelledby="progress-form__tab-2" tabindex="0" hidden>

                                <div class="container mt-4">

                                    <div class="col-lg-12 form__field">
                                        <label for="birtercih">1.Tercih</label>
                                        <select id="birtercih" name="birtercih" class="form-select" required>
                                            <option value="">Seçiniz</option>
                                            @foreach($campus as $c)
                                                <option value="{{$c->id}}"  @auth @if(Auth::user()->birtercih==$c->id) selected  @endif @endauth >{{$c->campus_name}}</option>
                                            @endforeach
                                        </select>

                                    </div>

                                </div>
                                <div class="container mt-4 form__field">

                                    <div class="col-lg-12 form__field">
                                        <label for="ikitercih" >2.Tercih</label>
                                        <select id="ikitercih" name="ikitercih" class="form-select" required>
                                            <option value="">Seçiniz</option>
                                            @foreach($campus as $c)
                                                <option value="{{$c->id}}" @auth @if(Auth::user()->ikitercih==$c->id) selected  @endif @endauth>{{$c->campus_name}}</option>
                                            @endforeach
                                        </select>

                                    </div>

                                </div>
                                <div class="container mt-4 form__field">

                                    <div class="col-lg-12">
                                        <label for="uctercih">3.Tercih</label>
                                        <select id="uctercih" name="uctercih" class="form-select" required>
                                            <option value="">Seçiniz</option>
                                            @foreach($campus as $c)
                                                <option value="{{$c->id}}" @auth @if(Auth::user()->uctercih==$c->id) selected  @endif @endauth>{{$c->campus_name}}</option>
                                            @endforeach

                                        </select>

                                    </div>

                                </div>

                                <div class="d-flex  sm:flex-row align-items-center justify-center sm:justify-end mt-4 sm:mt-5">
                                    <button type="button" class="mt-1 sm:mt-0 button--simple" data-action="prev">
                                        Geri
                                    </button>
                                    <button type="button" data-action="next">
                                        İleri
                                    </button>
                                </div>
                            </section>
                            <section id="progress-form__panel-3" style="margin-top: -50px;" role="tabpanel" aria-labelledby="progress-form__tab-3" tabindex="0" hidden>
                                <div class=" mt-4">
                                    <div class="col-lg-12">


                                        <div class="container form__field">
                                            <label for="cepno">Cep Telefonu <span style="color:red;">( Başında 0 olmadan 10 haneli olarak yazınız. )</span></label>
                                            <input type="number" id="cepno" name="cepno" class="form-control" required @auth value="{{Auth::user()->cepno}}" @endauth>
                                        </div>
                                        <div class="container mt-1 form__field">
                                            <label for="adres">Adres</label>
                                            <textarea id="adres" name="adres" class="form-control" required >@auth {{Auth::user()->adres}} @endauth</textarea>
                                        </div>
                                        <div class="container mt-1 form__field">
                                            <label for="eposta">Eposta</label>
                                            <input type="text"  name="eposta" @auth value="{{Auth::user()->eposta}}" @endauth class="form-control" required>
                                        </div>

                                    </div>
                                </div>


                                <div class="d-flex  sm:flex-row align-items-center justify-center sm:justify-end mt-4 sm:mt-5">
                                    <button type="button" class="mt-1 sm:mt-0 button--simple" data-action="prev">
                                        Geri
                                    </button>
                                    <button type="button" data-action="next">
                                        İleri
                                    </button>
                                </div>
                            </section>
                            <section id="progress-form__panel-4" style="margin-top: -50px;" role="tabpanel" aria-labelledby="progress-form__tab-4" tabindex="0" hidden>

                                <div class="mt-4 row ">
                                    <div class="col-lg-6">
                                        <div class="container">
                                            <div class="form__field">
                                                <label for="cinsiyet">Cinsiyet</label>
                                                <select name="cinsiyet" id="cinsiyet" class="form-control " required>
                                                    <option value="">Seçiniz</option>
                                                    <option value="Erkek" @auth @if(Auth::user()->cinsiyet=='Erkek') selected @endif @endauth >Erkek</option>
                                                    <option value="Kadın" @auth @if(Auth::user()->cinsiyet=='Kadın') selected @endif @endauth >Kadın</option>
                                                </select>
                                            </div>
                                            <div class="form__field">
                                                <label for="dtarihi" class="mt-4">Doğum Tarihi</label>
                                                <input type="date"  id="dtarihi" @auth value="{{Auth::user()->dtarihi}}" @endauth  name="dtarihi" class="form-control" required>
                                            </div>
                                            <div class="form__field">
                                                <label for="dyeri" class="mt-4">Doğum Yeri</label>
                                                <input type="text"  id="dyeri" name="dyeri" @auth value="{{Auth::user()->dyeri}}" @endauth class="form-control" required>
                                            </div>
                                            <div class="form__field">
                                                <label for="medenidurum" class="mt-4">Medeni Durumu</label>
                                                <select name="medenidurum" id="medenidurum" class="form-control" required>
                                                    <option value="">Seçiniz</option>
                                                    <option value="2" @auth @if(Auth::user()->medenidurum==2) selected @endif @endauth>Evli</option>
                                                    <option value="1"  @auth @if(Auth::user()->medenidurum==1) selected @endif @endauth >Bekar</option>
                                                </select>
                                            </div>

                                            <label for="cocuk" class="mt-4">(Varsa) Çocuklarınızın Yaşları</label>
                                            <input type="text" id="cocuk" name="cocuk" class="form-control" @auth value="{{Auth::user()->cocuk}}" @endauth>


                                        </div>

                                    </div>
                                    <div class="col-lg-6">
                                        <div class="row">

                                            <div class="col-lg-6 form__field">
                                                <label for="askerlikdurum" class="">Askerlik Durumu</label>
                                                <select name="askerlikdurum" id="askerlikdurum" class="form-control"  required>
                                                    <option value="">Seçiniz</option>
                                                    <option value="1" @auth @if(Auth::user()->askerlikdurum==1) selected @endif @endauth>Yapıldı</option>
                                                    <option value="2" @auth @if(Auth::user()->askerlikdurum==2) selected @endif @endauth >Bayan muaf</option>
                                                    <option value="3" @auth @if(Auth::user()->askerlikdurum==3) selected @endif @endauth>Tecilli</option>
                                                    <option value="4" @auth @if(Auth::user()->askerlikdurum==4) selected @endif @endauth>Yapılmadı</option>
                                                    <option value="5" @auth @if(Auth::user()->askerlikdurum==5) selected @endif @endauth>Sağlık Sebiyle Muaf</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-6 ">
                                                <label for="tecil" class="">Tecil Tarihi</label>
                                                <input type="date" class="form-control" id="tecil" name="tecil" @auth value="{{Auth::user()->tecil}}" @endauth >
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <label for="kangrubu" class="mt-4">Kan Grubu</label>
                                                <select name="kangrubu" id="kangrubu" class="form-control">
                                                    <option value="">Seçiniz</option>
                                                    <option value="0RH+" @auth @if(Auth::user()->kangrubu=="0RH+") selected @endif @endauth>0 RH +</option>
                                                    <option value="0RH-" @auth @if(Auth::user()->kangrubu=="0RH-") selected @endif @endauth>0 RH -</option>
                                                    <option value="ARH+" @auth @if(Auth::user()->kangrubu=="ARH+") selected @endif @endauth>A RH +</option>
                                                    <option value="ARH-" @auth @if(Auth::user()->kangrubu=="ARH-") selected @endif @endauth>A RH -</option>
                                                    <option value="BRH+" @auth @if(Auth::user()->kangrubu=="BRH+") selected @endif @endauth>B RH +</option>
                                                    <option value="BRH-" @auth @if(Auth::user()->kangrubu=="BRH-") selected @endif @endauth>B RH -</option>
                                                    <option value="ABRH+" @auth @if(Auth::user()->kangrubu=="ABRH+") selected @endif @endauth>AB RH +</option>
                                                    <option value="ABRH-" @auth @if(Auth::user()->kangrubu=="ABRH-") selected @endif @endauth>AB RH -</option>

                                                </select>
                                                <label for="acilkisi" class="mt-4">Acil Durumlarda Ulaşılacak Kişi</label>
                                                <input type="text" class="form-control" name="acilkisi" id="acilkisi" @auth value="{{Auth::user()->acilkisi}}" @endauth>
                                                <label for="acilkisitel" class="mt-4">Acil Durumlarda Aranacak Kişinin Telefonu</label>
                                                <input type="text" class="form-control" name="acilkisitel" id="acilkisitel" @auth value="{{Auth::user()->acilkisitel}}" @endauth>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="d-flex  sm:flex-row align-items-center justify-center sm:justify-end mt-4 sm:mt-5">
                                    <button type="button" class="mt-1 sm:mt-0 button--simple" data-action="prev">
                                        Geri
                                    </button>
                                    <button type="button" data-action="next">
                                        İleri
                                    </button>
                                </div>
                            </section>
                            <section id="progress-form__panel-5" style="margin-top: -50px;" role="tabpanel" aria-labelledby="progress-form__tab-5" tabindex="0" hidden>

                                <div class="row mt-4">

                                    <div class="col-lg-6">
                                        <div class="form__field">
                                            <label for="sonOkulderece" >En son mezun olduğunuz okul derecesi</label>
                                            <select name="sonOkulderece" id="sonOkulderece" class="form-control" required>
                                                <option value="">Seçiniz</option>
                                                <option value="İlköğretim" @auth @if(Auth::user()->sonOkulderece=="İlköğretim") selected @endif @endauth>Ortaokul Mezunu</option>
                                                <option value="Lise" @auth @if(Auth::user()->sonOkulderece=="Lise") selected @endif @endauth>Lise Mezunu</option>
                                                <option value="Yüksek Okul" @auth @if(Auth::user()->sonOkulderece=="Yüksek Okul") selected @endif @endauth>2 Yıllık Yüksek Okul</option>
                                                <option value="Lisans" @auth @if(Auth::user()->sonOkulderece=="Lisans") selected @endif @endauth>Lisans</option>
                                                <option value="Yüksek Lisans" @auth @if(Auth::user()->sonOkulderece=="Yüksek Lisans") selected @endif @endauth>Yüksek Lisans</option>
                                                <option value="Doktora" @auth @if(Auth::user()->sonOkulderece=="Doktora") selected @endif @endauth>Doktora</option>
                                                <option value="Doktora Sonrası" @auth @if(Auth::user()->sonOkulderece=="Doktora Sonrası") selected @endif @endauth>Doktora Sonrası</option>


                                            </select>
                                        </div>
                                        <div class="form__field">
                                            <label for="lisMezTar" class="mt-4">Lisans Üniversite Mezuniyet Tarihi</label>
                                            <select name="lisMezTar" id="lisMezTar" class="form-control">
                                                <option value="" name="lisMezTar" selected="">Yıl Seçiniz</option>
                                                <option value="1972" @auth @if(Auth::user()->lisMezTar==1972) selected @endif @endauth >1972</option>
                                                <option value="1973" @auth @if(Auth::user()->lisMezTar==1973) selected @endif @endauth >1973</option>
                                                <option value="1974" @auth @if(Auth::user()->lisMezTar==1974) selected @endif @endauth>1974</option>
                                                <option value="1975" @auth @if(Auth::user()->lisMezTar==1975) selected @endif @endauth>1975</option>
                                                <option value="1976" @auth @if(Auth::user()->lisMezTar==1976) selected @endif @endauth>1976</option>
                                                <option value="1977" @auth @if(Auth::user()->lisMezTar==1977) selected @endif @endauth>1977</option>
                                                <option value="1978" @auth @if(Auth::user()->lisMezTar==1978) selected @endif @endauth>1978</option>
                                                <option value="1979" @auth @if(Auth::user()->lisMezTar==1979) selected @endif @endauth>1979</option>
                                                <option value="1980" @auth @if(Auth::user()->lisMezTar==1980) selected @endif @endauth>1980</option>
                                                <option value="1981" @auth @if(Auth::user()->lisMezTar==1981) selected @endif @endauth>1981</option>
                                                <option value="1982" @auth @if(Auth::user()->lisMezTar==1982) selected @endif @endauth>1982</option>
                                                <option value="1983" @auth @if(Auth::user()->lisMezTar==1983) selected @endif @endauth>1983</option>
                                                <option value="1984" @auth @if(Auth::user()->lisMezTar==1984) selected @endif @endauth>1984</option>
                                                <option value="1985" @auth @if(Auth::user()->lisMezTar==1985) selected @endif @endauth>1985</option>
                                                <option value="1986" @auth @if(Auth::user()->lisMezTar==1986) selected @endif @endauth>1986</option>
                                                <option value="1987" @auth @if(Auth::user()->lisMezTar==1987) selected @endif @endauth>1987</option>
                                                <option value="1988" @auth @if(Auth::user()->lisMezTar==1988) selected @endif @endauth>1988</option>
                                                <option value="1989" @auth @if(Auth::user()->lisMezTar==1989) selected @endif @endauth>1989</option>
                                                <option value="1990" @auth @if(Auth::user()->lisMezTar==1990) selected @endif @endauth>1990</option>
                                                <option value="1991" @auth @if(Auth::user()->lisMezTar==1991) selected @endif @endauth>1991</option>
                                                <option value="1992" @auth @if(Auth::user()->lisMezTar==1992) selected @endif @endauth>1992</option>
                                                <option value="1993" @auth @if(Auth::user()->lisMezTar==1993) selected @endif @endauth>1993</option>
                                                <option value="1994" @auth @if(Auth::user()->lisMezTar==1994) selected @endif @endauth>1994</option>
                                                <option value="1995" @auth @if(Auth::user()->lisMezTar==1995) selected @endif @endauth>1995</option>
                                                <option value="1996" @auth @if(Auth::user()->lisMezTar==1996) selected @endif @endauth>1996</option>
                                                <option value="1997" @auth @if(Auth::user()->lisMezTar==1997) selected @endif @endauth>1997</option>
                                                <option value="1998" @auth @if(Auth::user()->lisMezTar==1998) selected @endif @endauth>1998</option>
                                                <option value="1999" @auth @if(Auth::user()->lisMezTar==1999) selected @endif @endauth>1999</option>
                                                <option value="2000" @auth @if(Auth::user()->lisMezTar==2000) selected @endif @endauth>2000</option>
                                                <option value="2001" @auth @if(Auth::user()->lisMezTar==2001) selected @endif @endauth>2001</option>
                                                <option value="2002" @auth @if(Auth::user()->lisMezTar==2002) selected @endif @endauth>2002</option>
                                                <option value="2003" @auth @if(Auth::user()->lisMezTar==2003) selected @endif @endauth>2003</option>
                                                <option value="2004" @auth @if(Auth::user()->lisMezTar==2004) selected @endif @endauth>2004</option>
                                                <option value="2005" @auth @if(Auth::user()->lisMezTar==2005) selected @endif @endauth>2005</option>
                                                <option value="2006" @auth @if(Auth::user()->lisMezTar==2006) selected @endif @endauth>2006</option>
                                                <option value="2007" @auth @if(Auth::user()->lisMezTar==2007) selected @endif @endauth>2007</option>
                                                <option value="2008" @auth @if(Auth::user()->lisMezTar==2008) selected @endif @endauth>2008</option>
                                                <option value="2009" @auth @if(Auth::user()->lisMezTar==2009) selected @endif @endauth>2009</option>
                                                <option value="2010" @auth @if(Auth::user()->lisMezTar==2010) selected @endif @endauth>2010</option>
                                                <option value="2011" @auth @if(Auth::user()->lisMezTar==2011) selected @endif @endauth>2011</option>
                                                <option value="2012" @auth @if(Auth::user()->lisMezTar==2012) selected @endif @endauth>2012</option>
                                                <option value="2013" @auth @if(Auth::user()->lisMezTar==2013) selected @endif @endauth>2013</option>
                                                <option value="2014" @auth @if(Auth::user()->lisMezTar==2014) selected @endif @endauth>2014</option>
                                                <option value="2015" @auth @if(Auth::user()->lisMezTar==2015) selected @endif @endauth>2015</option>
                                                <option value="2016" @auth @if(Auth::user()->lisMezTar==2016) selected @endif @endauth>2016</option>
                                                <option value="2017" @auth @if(Auth::user()->lisMezTar==2017) selected @endif @endauth>2017</option>
                                                <option value="2018" @auth @if(Auth::user()->lisMezTar==2018) selected @endif @endauth>2018</option>
                                                <option value="2019" @auth @if(Auth::user()->lisMezTar==2019) selected @endif @endauth>2019</option>
                                                <option value="2020" @auth @if(Auth::user()->lisMezTar==2020) selected @endif @endauth>2020</option>
                                                <option value="2021" @auth @if(Auth::user()->lisMezTar==2021) selected @endif @endauth>2021</option>
                                                <option value="2022" @auth @if(Auth::user()->lisMezTar==2022) selected @endif @endauth>2022</option>
                                                <option value="2023" @auth @if(Auth::user()->lisMezTar==2023) selected @endif @endauth>2023</option>
                                                <option value="2024" @auth @if(Auth::user()->lisMezTar==2024) selected @endif @endauth>2024</option>
                                                <option value="2025" @auth @if(Auth::user()->lisMezTar==2025) selected @endif @endauth>2025</option>
                                                <option value="2026" @auth @if(Auth::user()->lisMezTar==2026) selected @endif @endauth>2026</option>

                                            </select>
                                        </div>
                                        <div class="form__field">
                                            <label for="sonOkul" class="mt-4">Lisans Üniversite</label>
                                            <select name="sonOkul" id="sonOkul" name="lisUni" class="form-control">
                                                <option value="">Seçiniz</option>
                                                @foreach($university as $u)
                                                    <option value="{{$u->id}}" @auth @if(Auth::user()->sonOkul==$u->id) selected @endif @endauth>{{$u->university_name}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <div class="form__field">
                                            <label for="lFak" class="mt-4">Lisans Fakülte/Bölüm</label>
                                            <input type="text" class="form-control" name="lFak" id="lFak" @auth value="{{Auth::user()->lFak}}" @endauth>
                                        </div>
                                    </div>
                                    <div class="col lg-6">
                                        <label for="yLuni" class="">Yüksek Lisans Üniversite</label>
                                        <input type="text" class="form-control" name="yLuni" id="yLuni" @auth value="{{Auth::user()->yLuni}}" @endauth>
                                        <label for="yLisfak" class="mt-4">Yüksek Lisans Fakülte/Bölüm</label>
                                        <input type="text" class="form-control" name="yLisfak" id="yLisfak" @auth value="{{Auth::user()->yLisfak}}" @endauth>
                                        <label for="yDokUni" class="mt-4">Doktora Üniversite</label>
                                        <input type="text" name="yDokUni" class="form-control" id="yDokUni" @auth value="{{Auth::user()->yDokUni}}" @endauth>
                                        <label for="yDokBolum" class="mt-4">Doktora Bölüm</label>
                                        <input type="text" id="yDokBolum" name="yDokBolum" class="form-control" @auth value="{{Auth::user()->yDokBolum}}" @endauth >


                                    </div>
                                </div>

                                <div class="d-flex  sm:flex-row align-items-center justify-center sm:justify-end mt-4 sm:mt-5">
                                    <button type="button" class="mt-1 sm:mt-0 button--simple" data-action="prev">
                                        Geri
                                    </button>
                                    <button type="button" data-action="next">
                                        İleri
                                    </button>
                                </div>
                            </section>
                            <section id="progress-form__panel-6" style="margin-top: -50px;" role="tabpanel" aria-labelledby="progress-form__tab-6" tabindex="0" hidden>

                                <div class="mt-4">
                                    <div class="col lg-6">
                                        <label for="tecrube" >Tecrübe</label>
                                        <textarea class="form-control" id="tecrube" name="tecrube">@auth {{Auth::user()->tecrube}} @endauth</textarea>
                                        <label for="staj" class="mt-4">Stajlar</label>
                                        <textarea class="form-control" id="staj" name="staj">@auth {{Auth::user()->staj}} @endauth</textarea>
                                    </div>
                                </div>


                                <div class="d-flex  sm:flex-row align-items-center justify-center sm:justify-end mt-4 sm:mt-5">
                                    <button type="button" class="mt-1 sm:mt-0 button--simple" data-action="prev">
                                        Geri
                                    </button>
                                    <button type="button" data-action="next">
                                        İleri
                                    </button>
                                </div>
                            </section>
                            <section id="progress-form__panel-7" style="margin-top: -50px;" role="tabpanel" aria-labelledby="progress-form__tab-7" tabindex="0" hidden>

                                <div class="row mt-4">
                                    <div class="col-lg-6">
                                        <label for="ingSev">İngilizce Seviyesi</label>
                                        <select name="ingSev" id="ingSev" class="form-control">
                                            <option value="0" >BELİRLENMEDİ</option>
                                            <option value="1" @auth @if(Auth::user()->ingSev==1) selected @endif @endauth>1</option>
                                            <option value="2" @auth @if(Auth::user()->ingSev==2) selected @endif @endauth>2</option>
                                            <option value="3" @auth @if(Auth::user()->ingSev==3) selected @endif @endauth>3</option>
                                            <option value="4" @auth @if(Auth::user()->ingSev==4) selected @endif @endauth>4</option>
                                            <option value="5" @auth @if(Auth::user()->ingSev==5) selected @endif @endauth>5</option>
                                            <option value="6" @auth @if(Auth::user()->ingSev==6) selected @endif @endauth>6</option>
                                            <option value="7" @auth @if(Auth::user()->ingSev==7) selected @endif @endauth>7</option>
                                            <option value="8" @auth @if(Auth::user()->ingSev==8) selected @endif @endauth>8</option>
                                            <option value="9" @auth @if(Auth::user()->ingSev==9) selected @endif @endauth>9</option>
                                            <option value="10" @auth @if(Auth::user()->ingSev==10) selected @endif @endauth>10</option>

                                        </select>
                                        <label for="almSev" class="mt-4">Almanca Seviyesi</label>
                                        <select name="almSev" id="almSev" class="form-control">
                                            <option value="0" >BELİRLENMEDİ</option>
                                            <option value="1" @auth @if(Auth::user()->almSev==1) selected @endif @endauth>1</option>
                                            <option value="2" @auth @if(Auth::user()->almSev==2) selected @endif @endauth >2</option>
                                            <option value="3" @auth @if(Auth::user()->almSev==3) selected @endif @endauth>3</option>
                                            <option value="4" @auth @if(Auth::user()->almSev==4) selected @endif @endauth>4</option>
                                            <option value="5" @auth @if(Auth::user()->almSev==5) selected @endif @endauth>5</option>
                                            <option value="6" @auth @if(Auth::user()->almSev==6) selected @endif @endauth>6</option>
                                            <option value="7" @auth @if(Auth::user()->almSev==7) selected @endif @endauth>7</option>
                                            <option value="8" @auth @if(Auth::user()->almSev==8) selected @endif @endauth>8</option>
                                            <option value="9" @auth @if(Auth::user()->almSev==9) selected @endif @endauth>9</option>
                                            <option value="10" @auth @if(Auth::user()->almSev==10) selected @endif @endauth>10</option>
                                            <option value="0" >BELİRLENMEDİ</option>
                                        </select>
                                        <label for="frSev" class="mt-4">Fransızca Seviyesi</label>
                                        <select name="frSev" id="frSev" class="form-control">
                                            <option value="0" >BELİRLENMEDİ</option>
                                            <option value="1"  @auth @if(Auth::user()->frSev==1) selected @endif @endauth>1</option>
                                            <option value="2" @auth @if(Auth::user()->frSev==2) selected @endif @endauth>2</option>
                                            <option value="3" @auth @if(Auth::user()->frSev==3) selected @endif @endauth>3</option>
                                            <option value="4" @auth @if(Auth::user()->frSev==4) selected @endif @endauth>4</option>
                                            <option value="5" @auth @if(Auth::user()->frSev==5) selected @endif @endauth>5</option>
                                            <option value="6" @auth @if(Auth::user()->frSev==6) selected @endif @endauth>6</option>
                                            <option value="7" @auth @if(Auth::user()->frSev==7) selected @endif @endauth>7</option>
                                            <option value="8" @auth @if(Auth::user()->frSev==8) selected @endif @endauth>8</option>
                                            <option value="9" @auth @if(Auth::user()->frSev==9) selected @endif @endauth>9</option>
                                            <option value="10" @auth @if(Auth::user()->frSev==10) selected @endif @endauth>10</option>
                                            <option value="0" >BELİRLENMEDİ</option>
                                        </select>
                                        <label for="isSev" class="mt-4">İspanyolca Seviyesi</label>
                                        <select name="isSev" id="isSev" class="form-control">
                                            <option value="0" >BELİRLENMEDİ</option>
                                            <option value="1" @auth @if(Auth::user()->isSev==1) selected @endif @endauth>1</option>
                                            <option value="2" @auth @if(Auth::user()->isSev==2) selected @endif @endauth>2</option>
                                            <option value="3" @auth @if(Auth::user()->isSev==3) selected @endif @endauth>3</option>
                                            <option value="4" @auth @if(Auth::user()->isSev==4) selected @endif @endauth>4</option>
                                            <option value="5" @auth @if(Auth::user()->isSev==5) selected @endif @endauth>5</option>
                                            <option value="6" @auth @if(Auth::user()->isSev==6) selected @endif @endauth>6</option>
                                            <option value="7" @auth @if(Auth::user()->isSev==7) selected @endif @endauth>7</option>
                                            <option value="8" @auth @if(Auth::user()->isSev==8) selected @endif @endauth>8</option>
                                            <option value="9" @auth @if(Auth::user()->isSev==9) selected @endif @endauth>9</option>
                                            <option value="10" @auth @if(Auth::user()->isSev==10) selected @endif @endauth>10</option>
                                            <option value="0" >BELİRLENMEDİ</option>
                                        </select>
                                        <label for="ofisArac" class="mt-4">Ofis Araçları/Yazılımlar</label>
                                        <textarea class="form-control" id="ofisArac" name="ofisArac">@auth {{Auth::user()->ofisArac}} @endauth</textarea>

                                    </div>
                                    <div class="col-lg-6 mt-3">
                                        <label for="kurs" >Katıldığınız Kurs/Seminer</label>
                                        <textarea class="form-control" id="kurs" name="kurs">@auth {{Auth::user()->kurs}} @endauth</textarea>
                                        <label for="dernek"  class="mt-4">Üyesi bulunduğunuz Dernek / Kulüp / Oda adları</label>
                                        <textarea class="form-control" id="dernek" name="dernek">@auth {{Auth::user()->dernek}} @endauth</textarea>
                                        <label for="uzmanlik"  class="mt-4">Uzmanlık alanlarınız</label>
                                        <textarea class="form-control" id="uzmanlik" name="uzmanlik">@auth {{Auth::user()->uzmanlik}} @endauth</textarea>
                                        <label for="notlar"  class="mt-4">Eklemek İstediğiniz Notlarınız (varsa) yazınız</label>
                                        <textarea class="form-control" id="notlar" name="notlar">@auth {{Auth::user()->notlar}} @endauth</textarea>
                                    </div>
                                </div>


                                <div class="d-flex  sm:flex-row align-items-center justify-center sm:justify-end mt-4 sm:mt-5">
                                    <button type="button" class="mt-1 sm:mt-0 button--simple" data-action="prev">
                                        Geri
                                    </button>
                                    <button type="button" data-action="next">
                                        İleri
                                    </button>
                                </div>
                            </section>
                            <!-- / End Step 2 -->

                            <!-- Step 3 -->
                            <section id="progress-form__panel-8" style="margin-top: -50px;" role="tabpanel" aria-labelledby="progress-form__tab-8" tabindex="0" hidden>
                                <div class="mt-4">
                                    <label for="ref1"  class="">1.Referans <span style="color:red;">( Adı,Soyadı,Görevi,Telefonu )</span></label>
                                    <textarea class="form-control" id="ref1" name="ref1">@auth {{Auth::user()->ref1}} @endauth</textarea>
                                    <label for="ref2"  class="mt-4">2.Referans <span style="color:red;">( Adı,Soyadı,Görevi,Telefonu )</span></label>
                                    <textarea class="form-control" id="ref2" name="ref2">@auth {{Auth::user()->ref2}} @endauth</textarea>
                                    <label for="ref3"  class="mt-4">3.Referans <span style="color:red;">( Adı,Soyadı,Görevi,Telefonu )</span></label>
                                    <textarea class="form-control" id="ref3" name="ref3">@auth {{Auth::user()->ref3}} @endauth</textarea>
                                    <label  class="mt-4"><b>Yasal Hatırlatma</b><p>Eğitim Kurumlarımızda kayıtlı olan ticari iletişim araçlarınıza, ürün ve faaliyetlerimiz ile sınırlı olmak kaydıyla, tanıtım amaçlı ilan ve reklam yanında ticari elektronik ileti gönderilecek olup, elektronik ticari ileti almak istemediğiniz takdirde, aşağıdaki seçenekte seçiminizi yapınız.</p></label>
                                    <div class="row">
                                        <div class="col-lg-12"> <input type="radio" name="smsonay" value="1" checked="" id="sms1"><span style="font-size: 14px;">SMS ve E-POSTA ALMAK İSTİYORUM</span></div>

                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12"> <input type="radio" name="smsonay" value="0" id="sms2" ><span style="font-size: 14px;">SMS ve E-POSTA ALMAK İSTEMİYORUM</span></div>
                                        @auth <input type="hidden" name="authmu" value="1"> @endauth
                                    </div>


                                </div>
                                <div class="d-flex  sm:flex-row align-items-center justify-center sm:justify-end mt-4 sm:mt-5">
                                    <button type="button" class="mt-1 sm:mt-0 button--simple" data-action="prev">
                                        Geri
                                    </button>
                                    <button type="submit">
                                        Gönder
                                    </button>
                                </div>
                            </section>
                            <!-- / End Step 3 -->

                            <!-- Thank You -->

                            <!-- / End Thank You -->

                        </form>
                    </div>
                    <!-- end of .container-->

                </section>
                <div class="col-xl-7 offset-xl-1 align-self-end mt-4 mt-xl-0"><!--<a class="img-landing-banner rounded" href="{{asset('tema/public/')}}index.html"><img class="img-fluid" src="{{asset('tema/public/')}}/assets/img/generic/dashboard-alt.jpg" alt="" /></a></div> -->
            </div>
        </div>
        <!-- end of .container-->

    </section>
    <!-- <section> close ============================-->
    <!-- ============================================-->




    <!-- ============================================-->
    <!-- <section> begin ============================-->

    <!-- <section> close ============================-->
    <!-- ============================================-->




    <!-- ============================================-->
    <!-- <section> begin ============================-->

    <!-- <section> close ============================-->
    <!-- ============================================-->




    <!-- ============================================-->
    <!-- <section> begin ============================-->

    <!-- <section> close ============================-->
    <!-- ============================================-->




    <!-- ============================================-->
    <!-- <section> begin ============================-->

    <!-- <section> close ============================-->
    <!-- ============================================-->




    <!-- ============================================-->
    <!-- <section> begin ============================-->

@endsection
    <!-- <section> close ============================-->
    <!-- ============================================-->



@section('js')
    <script>
        console.clear();

        function ready(fn) {
            if (document.readyState === 'complete' || document.readyState === 'interactive') {
                setTimeout(fn, 1);
                document.removeEventListener('DOMContentLoaded', fn);
            } else {
                document.addEventListener('DOMContentLoaded', fn);
            }
        }

        ready(function() {

            // Global Constants

            const progressForm = document.getElementById('progress-form');

            const tabItems  = progressForm.querySelectorAll('[role="tab"]')
                , tabPanels = progressForm.querySelectorAll('[role="tabpanel"]');

            let currentStep = 0;

            // Form Validation

            /*****************************************************************************
             * Expects a string.
             *
             * Returns a boolean if the provided value *reasonably* matches the pattern
             * of a US phone number. Optional extension number.
             */

            const isValidPhone = val => {
                const regex = new RegExp(/^[-. (]*(\d{3})[-. )]*(\d{3})[-. ]*(\d{4})(?: *x(\d+))?$/);

                return regex.test(val);
            };

            /*****************************************************************************
             * Expects a string.
             *
             * Returns a boolean if the provided value *reasonably* matches the pattern
             * of a real email address.
             *
             * NOTE: There is no such thing as a perfect regular expression for email
             *       addresses; further, the validity of an email address cannot be
             *       verified on the front end. This is the closest we can get without
             *       our own service or a service provided by a third party.
             *
             * RFC 5322 Official Standard: https://emailregex.com/
             */

            const isValidEmail = val => {
                const regex = new RegExp(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/);

                return regex.test(val);
            };

            /*****************************************************************************
             * Expects a Node (input[type="text"] or textarea).
             */

            const validateText = field => {
                const val = field.value.trim();

                if (val === '' && field.required) {
                    return {
                        isValid: false
                    };
                } else {
                    return {
                        isValid: true
                    };
                }
            };

            /*****************************************************************************
             * Expects a Node (select).
             */

            const validateSelect = field => {
                const val = field.value.trim();

                if (val === '' && field.required) {
                    return {
                        isValid: false,
                        message: 'Seçim yapınız.'
                    };
                } else {
                    return {
                        isValid: true
                    };
                }
            };

            /*****************************************************************************
             * Expects a Node (fieldset).
             */

            const validateGroup = fieldset => {
                const choices = fieldset.querySelectorAll('input[type="radio"], input[type="checkbox"]');

                let isRequired = false
                    , isChecked  = false;

                for (const choice of choices) {
                    if (choice.required) {
                        isRequired = true;
                    }

                    if (choice.checked) {
                        isChecked = true;
                    }
                }

                if (!isChecked && isRequired) {
                    return {
                        isValid: false,
                        message: 'Please make a selection.'
                    };
                } else {
                    return {
                        isValid: true
                    };
                }
            };

            /*****************************************************************************
             * Expects a Node (input[type="radio"] or input[type="checkbox"]).
             */

            const validateChoice = field => {
                return validateGroup(field.closest('fieldset'));
            };

            /*****************************************************************************
             * Expects a Node (input[type="tel"]).
             */

            const validatePhone = field => {
                const val = field.value.trim();

                if (val === '' && field.required) {
                    return {
                        isValid: false
                    };
                } else if (val !== '' && !isValidPhone(val)) {
                    return {
                        isValid: false,
                        message: 'Please provide a valid US phone number.'
                    };
                } else {
                    return {
                        isValid: true
                    };
                }
            };

            /*****************************************************************************
             * Expects a Node (input[type="email"]).
             */

            const validateEmail = field => {
                const val = field.value.trim();

                if (val === '' && field.required) {
                    return {
                        isValid: false
                    };
                } else if (val !== '' && !isValidEmail(val)) {
                    return {
                        isValid: false,
                        message: 'Please provide a valid email address.'
                    };
                } else {
                    return {
                        isValid: true
                    };
                }
            };

            /*****************************************************************************
             * Expects a Node (field or fieldset).
             *
             * Returns an object describing the field's overall validity, as well as
             * a possible error message where additional information may be helpful for
             * the user to complete the field.
             */

            const getValidationData = field => {
                switch (field.type) {
                    case 'text':
                    case 'hidden':
                    case 'file':
                    case 'number':
                    case 'date':
                    case 'textarea':
                        return validateText(field);
                    case 'select-one':
                        return validateSelect(field);
                    case 'fieldset':
                        return validateGroup(field);
                    case 'radio':
                    case 'checkbox':
                        return validateChoice(field);
                    case 'tel':
                        return validatePhone(field);
                    case 'email':
                        return validateEmail(field);
                    default:
                        throw new Error(`The provided field type '${field.tagName}:${field.type}' is not supported in this form.`);
                }
            };

            /*****************************************************************************
             * Expects a Node (field or fieldset).
             *
             * Returns the field's overall validity based on conditions set within
             * `getValidationData()`.
             */

            const isValid = field => {
                return getValidationData(field).isValid;
            };

            /*****************************************************************************
             * Expects an integer.
             *
             * Returns a promise that either resolves if all fields in a given step are
             * valid, or rejects and returns invalid fields for further processing.
             */

            const validateStep = currentStep => {
                const fields = tabPanels[currentStep].querySelectorAll('fieldset, input:not([type="radio"]):not([type="checkbox"]), select, textarea');

                const invalidFields = [...fields].filter(field => {
                    return !isValid(field);
                });

                return new Promise((resolve, reject) => {
                    if (invalidFields && !invalidFields.length) {
                        resolve();
                    } else {
                        reject(invalidFields);
                    }
                });
            };

            // Form Error and Success

            const FIELD_PARENT_CLASS = 'form__field'
                , FIELD_ERROR_CLASS  = 'form__error-text';

            /*****************************************************************************
             * Expects a Node (fieldset) that contains any number of radio or checkbox
             * input elements, and a string representing the group's validation status.
             */

            function updateChoice(fieldset, status, errorId = '') {
                const choices = fieldset.querySelectorAll('[type="radio"], [type="checkbox"]');

                for (const choice of choices) {
                    if (status) {
                        choice.setAttribute('aria-invalid', 'true');
                        choice.setAttribute('aria-describedby', errorId);
                    } else {
                        choice.removeAttribute('aria-invalid');
                        choice.removeAttribute('aria-describedby');
                    }
                }
            }

            /*****************************************************************************
             * Expects a Node (field or fieldset) that either has the class name defined
             * by `FIELD_PARENT_CLASS`, or has a parent with that class name. Optional
             * string defines the error message.
             *
             * Builds and appends an error message to the parent element, or updates an
             * existing error message.
             *
             * https://www.davidmacd.com/blog/test-aria-describedby-errormessage-aria-live.html
             */

            function reportError(field, message = 'Lütfen Doldurunuz.') {
                const fieldParent = field.closest(`.${FIELD_PARENT_CLASS}`);

                if (progressForm.contains(fieldParent)) {
                    let fieldError   = fieldParent.querySelector(`.${FIELD_ERROR_CLASS}`)
                        , fieldErrorId = '';

                    if (!fieldParent.contains(fieldError)) {
                        fieldError = document.createElement('p');

                        if (field.matches('fieldset')) {
                            fieldErrorId = `${field.id}__error`;

                            updateChoice(field, true, fieldErrorId);
                        } else if (field.matches('[type="radio"], [type="checkbox"]')) {
                            fieldErrorId = `${field.closest('fieldset').id}__error`;

                            updateChoice(field.closest('fieldset'), true, fieldErrorId);
                        } else {
                            fieldErrorId = `${field.id}__error`;

                            field.setAttribute('aria-invalid', 'true');
                            field.setAttribute('aria-describedby', fieldErrorId);
                        }

                        fieldError.id = fieldErrorId;
                        fieldError.classList.add(FIELD_ERROR_CLASS);

                        fieldParent.appendChild(fieldError);
                    }

                    fieldError.textContent = message;
                }
            }

            /*****************************************************************************
             * Expects a Node (field or fieldset) that either has the class name defined
             * by `FIELD_PARENT_CLASS`, or has a parent with that class name.
             *
             * https://www.davidmacd.com/blog/test-aria-describedby-errormessage-aria-live.html
             */

            function reportSuccess(field) {
                const fieldParent = field.closest(`.${FIELD_PARENT_CLASS}`);

                if (progressForm.contains(fieldParent)) {
                    const fieldError = fieldParent.querySelector(`.${FIELD_ERROR_CLASS}`);

                    if (fieldParent.contains(fieldError)) {
                        if (field.matches('fieldset')) {
                            updateChoice(field, false);
                        } else if (field.matches('[type="radio"], [type="checkbox"]')) {
                            updateChoice(field.closest('fieldset'), false);
                        } else {
                            field.removeAttribute('aria-invalid');
                            field.removeAttribute('aria-describedby');
                        }

                        fieldParent.removeChild(fieldError);
                    }
                }
            }

            /*****************************************************************************
             * Expects a Node (field or fieldset).
             *
             * Reports the field's overall validity to the user based on conditions set
             * within `getValidationData()`.
             */

            function reportValidity(field) {
                const validation = getValidationData(field);

                if (!validation.isValid && validation.message) {
                    reportError(field, validation.message);
                } else if (!validation.isValid) {
                    reportError(field);
                } else {
                    reportSuccess(field);
                }
            }

            // Form Progression

            /*****************************************************************************
             * Resets the state of all tabs and tab panels.
             */

            function deactivateTabs() {
                // Reset state of all tab items
                tabItems.forEach(tab => {
                    tab.setAttribute('aria-selected', 'false');
                    tab.setAttribute('tabindex', '-1');
                });

                // Reset state of all panels
                tabPanels.forEach(panel => {
                    panel.setAttribute('hidden', '');
                });
            }

            /*****************************************************************************
             * Expects an integer.
             *
             * Shows the desired tab and its associated tab panel, then updates the form's
             * current step to match the tab's index.
             */

            function activateTab(index) {
                const thisTab   = tabItems[index]
                    , thisPanel = tabPanels[index];

                // Close all other tabs
                deactivateTabs();

                // Focus the activated tab for accessibility
                thisTab.focus();

                // Set the interacted tab to active
                thisTab.setAttribute('aria-selected', 'true');
                thisTab.removeAttribute('tabindex');

                // Display the associated tab panel
                thisPanel.removeAttribute('hidden');

                // Update the current step with the interacted tab's index value
                currentStep = index;
            }

            /*****************************************************************************
             * Expects an event from a click listener.
             */

            function clickTab(e) {
                activateTab([...tabItems].indexOf(e.currentTarget));
            }

            /*****************************************************************************
             * Expects an event from a keydown listener.
             */

            function arrowTab(e) {
                const { keyCode, target } = e;

                /**
                 * If the current tab has an enabled next/previous sibling, activate it.
                 * Otherwise, activate the tab at the beginning/end of the list.
                 */

                const targetPrev  = target.previousElementSibling
                    , targetNext  = target.nextElementSibling
                    , targetFirst = target.parentElement.firstElementChild
                    , targetLast  = target.parentElement.lastElementChild;

                const isDisabled = node => node.hasAttribute('aria-disabled');

                switch (keyCode) {
                    case 37: // Left arrow
                        if (progressForm.contains(targetPrev) && !isDisabled(targetPrev)) {
                            activateTab(currentStep - 1);
                        } else if (!isDisabled(targetLast)) {
                            activateTab(tabItems.length - 1);
                        } break;
                    case 39: // Right arrow
                        if (progressForm.contains(targetNext) && !isDisabled(targetNext)) {
                            activateTab(currentStep + 1);
                        } else if (!isDisabled(targetFirst)) {
                            activateTab(0);
                        } break;
                }
            }

            /*****************************************************************************
             * Expects a boolean.
             *
             * Updates the visual state of the progress bar and makes the next tab
             * available for interaction (if there is a next tab).
             */

            // Immediately attach event listeners to the first tab (happens only once)
            tabItems[0].addEventListener('click', clickTab);
            tabItems[0].addEventListener('keydown', arrowTab);

            function handleProgress(isComplete) {
                const currentTab = tabItems[currentStep]
                    , nextTab    = tabItems[currentStep + 1];

                if (isComplete) {
                    currentTab.setAttribute('data-complete', 'true');

                    /**
                     * Verify that there is, indeed, a next tab before modifying or listening
                     * to it. In case we've reached the last item in the tablist.
                     */

                    if (progressForm.contains(nextTab)) {
                        nextTab.removeAttribute('aria-disabled');

                        nextTab.addEventListener('click', clickTab);
                        nextTab.addEventListener('keydown', arrowTab);
                    }

                } else {
                    currentTab.setAttribute('data-complete', 'false');
                }
            }

            // Form Interactions

            /*****************************************************************************
             * Returns a function that only executes after a delay.
             *
             * https://davidwalsh.name/javascript-debounce-function
             */

            const debounce = (fn, delay = 500) => {
                let timeoutID;

                return (...args) => {
                    if (timeoutID) {
                        clearTimeout(timeoutID);
                    }

                    timeoutID = setTimeout(() => {
                        fn.apply(null, args);
                        timeoutID = null;
                    }, delay);
                };
            };

            /*****************************************************************************
             * Waits 0.5s before reacting to any input events. This reduces the frequency
             * at which the listener is fired, making the errors less "noisy". Improves
             * both performance and user experience.
             */

            progressForm.addEventListener('input', debounce(e => {
                const { target } = e;

                validateStep(currentStep).then(() => {

                    // Update the progress bar (step complete)
                    handleProgress(true);

                }).catch(() => {

                    // Update the progress bar (step incomplete)
                    handleProgress(false);

                });

                // Display or remove any error messages
                reportValidity(target);
            }));

            /****************************************************************************/

            progressForm.addEventListener('click', e => {
                const { target } = e;

                if (target.matches('[data-action="next"]')) {
                    validateStep(currentStep).then(() => {

                        // Update the progress bar (step complete)
                        handleProgress(true);

                        // Progress to the next step
                        activateTab(currentStep + 1);

                    }).catch(invalidFields => {

                        // Update the progress bar (step incomplete)
                        handleProgress(false);

                        // Show errors for any invalid fields
                        invalidFields.forEach(field => {
                            reportValidity(field);
                        });

                        // Focus the first found invalid field for the user
                        invalidFields[0].focus();

                    });
                }

                if (target.matches('[data-action="prev"]')) {

                    // Revisit the previous step
                    activateTab(currentStep - 1);

                }
            });

            // Form Submission

            /*****************************************************************************
             * Returns the user's IP address.
             */


        });

    </script>
@endsection
    <!-- ============================================-->
    <!-- <section> begin ============================-->
