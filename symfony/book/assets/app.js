import './bootstrap.js';
import './styles/app.css';
import { registerReactControllerComponents } from '@symfony/ux-react';

console.log('This log comes from assets/app.js - welcome to AssetMapper! 🎉');

registerReactControllerComponents(require.context('./react/controllers', true, /\.(j|t)sx?$/));
