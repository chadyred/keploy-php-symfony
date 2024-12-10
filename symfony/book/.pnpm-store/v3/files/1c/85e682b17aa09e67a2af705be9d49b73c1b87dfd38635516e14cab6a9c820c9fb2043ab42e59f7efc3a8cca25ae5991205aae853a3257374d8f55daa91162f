var __awaiter = (this && this.__awaiter) || function (thisArg, _arguments, P, generator) {
    function adopt(value) { return value instanceof P ? value : new P(function (resolve) { resolve(value); }); }
    return new (P || (P = Promise))(function (resolve, reject) {
        function fulfilled(value) { try { step(generator.next(value)); } catch (e) { reject(e); } }
        function rejected(value) { try { step(generator["throw"](value)); } catch (e) { reject(e); } }
        function step(result) { result.done ? resolve(result.value) : adopt(result.value).then(fulfilled, rejected); }
        step((generator = generator.apply(thisArg, _arguments || [])).next());
    });
};
import { userEvent, within } from '@storybook/test';
import Admin from './Admin';
const meta = {
    title: 'Admin/Auth',
    component: Admin,
    parameters: {
        layout: 'fullscreen',
    },
};
export default meta;
export const Basic = {
    play: (_a) => __awaiter(void 0, [_a], void 0, function* ({ canvasElement, step }) {
        const canvas = within(canvasElement);
        yield canvas.findByText('Sign in');
        yield step('Enter email and password', () => __awaiter(void 0, void 0, void 0, function* () {
            yield userEvent.type(canvas.getByLabelText('Username *'), 'john');
            yield userEvent.type(canvas.getByLabelText('Password *'), '123');
        }));
    }),
    args: {
        entrypoint: process.env.ENTRYPOINT,
    },
};
export const Loggedin = {
    play: (_a) => __awaiter(void 0, [_a], void 0, function* ({ canvasElement, step }) {
        const canvas = within(canvasElement);
        const signIn = yield canvas.findByText('Sign in');
        yield step('Enter email and password', () => __awaiter(void 0, void 0, void 0, function* () {
            yield userEvent.type(canvas.getByLabelText('Username *'), 'john');
            yield userEvent.type(canvas.getByLabelText('Password *'), '123');
        }));
        yield step('Submit form', () => __awaiter(void 0, void 0, void 0, function* () {
            yield userEvent.click(signIn);
        }));
        yield canvas.findByText('John Doe');
    }),
    args: {
        entrypoint: process.env.ENTRYPOINT,
    },
};
//# sourceMappingURL=Auth.stories.js.map