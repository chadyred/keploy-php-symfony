import React from 'react';
import { HydraAdmin } from '../hydra';
import ResourceGuesser from '../core/ResourceGuesser';
import ListGuesser from '../list/ListGuesser';
import ShowGuesser from '../show/ShowGuesser';
import FieldGuesser from '../field/FieldGuesser';
import EditGuesser from '../edit/EditGuesser';
import InputGuesser from '../input/InputGuesser';
import CreateGuesser from '../create/CreateGuesser';
export default {
    title: 'Admin/Custom',
    parameters: {
        layout: 'fullscreen',
    },
};
const GreetingList = () => (React.createElement(ListGuesser, null,
    React.createElement(FieldGuesser, { source: "name", label: "Identity" })));
const GreetingShow = () => (React.createElement(ShowGuesser, null,
    React.createElement(FieldGuesser, { source: "name", label: "Identity" })));
const GreetingEdit = () => (React.createElement(EditGuesser, null,
    React.createElement(InputGuesser, { source: "name", label: "Identity" })));
const GreetingCreate = () => (React.createElement(CreateGuesser, null,
    React.createElement(InputGuesser, { source: "name", label: "Identity" })));
export const Custom = () => (React.createElement(HydraAdmin, { entrypoint: process.env.ENTRYPOINT },
    React.createElement(ResourceGuesser, { name: "greetings", options: { label: 'Salutation' }, list: GreetingList, show: GreetingShow, edit: GreetingEdit, create: GreetingCreate })));
//# sourceMappingURL=Custom.stories.js.map