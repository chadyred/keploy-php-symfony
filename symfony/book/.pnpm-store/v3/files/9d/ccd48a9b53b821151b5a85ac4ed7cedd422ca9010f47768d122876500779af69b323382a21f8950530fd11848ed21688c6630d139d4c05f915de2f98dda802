var __awaiter = (this && this.__awaiter) || function (thisArg, _arguments, P, generator) {
    function adopt(value) { return value instanceof P ? value : new P(function (resolve) { resolve(value); }); }
    return new (P || (P = Promise))(function (resolve, reject) {
        function fulfilled(value) { try { step(generator.next(value)); } catch (e) { reject(e); } }
        function rejected(value) { try { step(generator["throw"](value)); } catch (e) { reject(e); } }
        function step(result) { result.done ? resolve(result.value) : adopt(result.value).then(fulfilled, rejected); }
        step((generator = generator.apply(thisArg, _arguments || [])).next());
    });
};
import { within } from '@storybook/test';
import Basic from './Basic';
const meta = {
    title: 'Admin/Basic',
    component: Basic,
    tags: ['autodocs'],
    parameters: {
        layout: 'fullscreen',
    },
};
export default meta;
export const Admin = {
    play: (_a) => __awaiter(void 0, [_a], void 0, function* ({ canvasElement }) {
        const canvas = within(canvasElement);
        yield canvas.findByText('Greetings');
    }),
    args: {
        entrypoint: process.env.ENTRYPOINT,
    },
};
//# sourceMappingURL=Basic.stories.js.map