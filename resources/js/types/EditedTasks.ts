import type { Task } from "./task";

export type EditedTasks = {
  super: {
    [statusId: number]: Task[];
  };
  warning: {
    [statusId: number]: Task[];
  };
  normal: {
    [statuId: number]: Task[];
  }
}
