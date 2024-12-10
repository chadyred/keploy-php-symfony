import createSubscription from './createSubscription.js';
// store mercure subscriptions
const subscriptions = {};
let mercure = null;
let dataTransform = (parsedData) => parsedData;
const stopSubscription = (sub) => {
    if (sub.subscribed && sub.eventSource && sub.eventListener) {
        sub.eventSource.removeEventListener('message', sub.eventListener);
        sub.eventSource.close();
    }
};
export default {
    subscribe: (resourceId, topic, callback) => {
        if (mercure === null) {
            return;
        }
        const sub = subscriptions[resourceId];
        if (sub !== undefined) {
            sub.count += 1;
            return;
        }
        subscriptions[resourceId] = createSubscription(mercure, topic, callback, dataTransform);
    },
    unsubscribe: (resourceId) => {
        const sub = subscriptions[resourceId];
        if (sub === undefined) {
            return;
        }
        sub.count -= 1;
        if (sub.count <= 0) {
            stopSubscription(sub);
            delete subscriptions[resourceId];
        }
    },
    initSubscriptions: () => {
        const mercureOptions = mercure;
        if (mercureOptions === null) {
            return;
        }
        const subKeys = Object.keys(subscriptions);
        subKeys.forEach((subKey) => {
            const sub = subscriptions[subKey];
            if (sub && !sub.subscribed) {
                subscriptions[subKey] = createSubscription(mercureOptions, sub.topic, sub.callback, dataTransform);
            }
        });
    },
    setMercureOptions: (mercureOptions) => {
        mercure = mercureOptions;
    },
    setDataTransformer: (dataTransformer) => {
        dataTransform = dataTransformer;
    },
};
//# sourceMappingURL=manager.js.map