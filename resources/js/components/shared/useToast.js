import { useToast } from "primevue/usetoast";

export const createToast = () => {
    const toast = useToast();
    
    return (severity, summary, detail, life = 3000) => {
        toast.add({ severity, summary, detail, life });
    };
};

