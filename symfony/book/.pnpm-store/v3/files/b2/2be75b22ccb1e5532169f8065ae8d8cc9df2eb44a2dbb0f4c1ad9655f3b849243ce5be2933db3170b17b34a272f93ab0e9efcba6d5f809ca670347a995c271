import jsonExport from 'jsonexport/dist';
import { downloadCSV } from './downloadCSV';
export var defaultExporter = function (data, _, __, resource) {
    return jsonExport(data, function (err, csv) { return downloadCSV(csv, resource); });
};
//# sourceMappingURL=defaultExporter.js.map