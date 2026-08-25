import { Card, CardContent } from "@/components/ui/card"
import { ScrollArea } from "@/components/ui/scroll-area"

export default function TaskCommnets() {
  return (
    <>
      <div className="rounded-xl h-full border-2 border-gray-300 overflow-hidden">
        <div className="px-4 py-3 bg-gray-300 font-bold">
          コメント欄
        </div>
        <ScrollArea className="h-full bg-red-50 p-2">
          <div className="space-y-3">
            <Card className="m-2">
              <CardContent className="p-4">
                <div className="font-semibold text-sm">
                  福田
                </div>
                <div className="text-xs text-gray-500">
                  2026/08/25/12:00
                </div>
                <p className="mt-2 text-sm text-gray-700">
                  テストコメント
                </p>
              </CardContent>
            </Card>
          </div>
        </ScrollArea>
      </div>
    </>
  )
}
