declare const authProvider: {
    login: ({ username, password }: {
        username: string;
        password: string;
    }) => Promise<void>;
    logout: () => Promise<void>;
    checkAuth: () => Promise<void>;
    checkError: (error: {
        status: number;
    }) => Promise<void>;
    getIdentity: () => Promise<{
        id: string;
        fullName: string;
    }>;
    getPermissions: () => Promise<string>;
};
export default authProvider;
//# sourceMappingURL=basicAuth.d.ts.map